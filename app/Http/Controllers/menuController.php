<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Allegen;
use App\Models\menuItem;
use Illuminate\Http\Request;
use App\Models\allegens_menu_item;
use Illuminate\Support\Facades\File;

class menuController extends Controller
{
    public function show() {
        $menuItem = menuItem::all();

        return view("menu.show", [
            'menuItems' => $menuItem
        ]);
    }

    public function showSingle($id) {
        $menuItem = menuItem::findOrFail($id);

        return view("menu.single", [
            'menuItem' => $menuItem
        ]);
    }

    public function createForm() {
        $allegens = Allegen::all();

        return view("menu.create", [
            'allegens' => $allegens,
        ]);
    }

    public function submitCreate(Request $request) {
        //Image Methods 
        //guessExtension() - Returns the file extension type
        //getMimeType()
        //store()
        //asStore
        //storePubliciy()
        //move()
        //getClientOriginalName()
        //getSize()

        //$test = $request->file('image')->getSize();

        $formFields = $request->validate([
            'dishTitle' => 'required',
            'description' => 'required',
            'protein' => 'required',
            'calories' => 'required',
            'carbs' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        //Giving the image a new name
        $newImageName = time() . '-' . $request->image->getClientOriginalName();

        $request->image->move(public_path('\resources\Images\menu\food-images'), $newImageName);

        $formFields['image'] = $newImageName;

        $menuItem = menuItem::create([
            'dishTitle' => $request->input('dishTitle'),
            'description' => $request->input('description'),
            'protein' => $request->input('protein'),
            'calories' => $request->input('calories'),
            'carbs' => $request->input('carbs'),
            'price' => $request->input('price'),
            'image_path' =>  $newImageName,
        ]);

        $menuItem->allegens()->attach($request->allegens);

        return redirect('/admin/index')->with('message', "Item Created");
    }

    public function delete($id) { 
        menuItem::findOrFail($id)->delete();

        return back()->with('message', "Item Deleted");
    }

    public function editForm($id) {
        $item = menuItem::findOrFail($id);
        $allegens = Allegen::all();

        return view("menu.edit", [
            'item' => $item,
            'allegens' => $allegens,
        ]);
    }

    public function postEdit($id, Request $request) {
        $request->validate([
            'dishTitle' => 'required',
            'description' => 'required',
            'protein' => 'required',
            'calories' => 'required',
            'carbs' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        $item = menuItem::findOrFail($id);
        
        if($request->hasFile('image')) {
            //Saving the file path to a variable     
            $destination = "resources/Images/menu/food-images/" .$item->image_path;
            
            //Checking there is an image in that destination
            if(File::exists($destination)) {
                //Deleting the image
                File::delete($destination);
            }
            
            //Giving the image a new name
            $newImageName = time() . '-' . $request->image->getClientOriginalName();

            //Saving new image 
            $request->image->move(public_path('\resources\Images\menu\food-images'), $newImageName);

            //Updating the image path in database
            $item->update(['image_path' => $newImageName]);
        }

        $item->update([
            'dishTitle' => $request->dishTitle,
            'description' => $request->description,
            'protein' => $request->protein,
            'calories' => $request->calories,
            'carbs' => $request->carbs,
            'price' => $request->price,
        ]);

        $item->allegens()->detach();
        $item->allegens()->attach($request->allegens);

        return back()->with('message', "Item Updated");
    }
}
