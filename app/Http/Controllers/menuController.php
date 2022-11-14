<?php

namespace App\Http\Controllers;

use App\Models\Allegen;
use App\Models\menuItem;
use App\Models\allegens_menu_item;
use Illuminate\Http\Request;

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
        $formFields = $request->validate([
            'dishTitle' => 'required',
            'description' => 'required',
            'protein' => 'required',
            'calories' => 'required',
            'carbs' => 'required',
            'price' => 'required',
        ]);

        $menuItem = menuItem::create($formFields);

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
        ]);

        $item = menuItem::findOrFail($id);

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
