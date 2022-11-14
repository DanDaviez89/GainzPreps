<?php

namespace App\Http\Controllers;

use App\Models\Allegen;
use Illuminate\Http\Request;

class allegenController extends Controller
{
    public function index() {
        $allegens = Allegen::all();

        return view('admin.allegen', [
            'allgens' => $allegens
        ]);
    }

    public function create(Request $request) {
        $formField = $request->validate([
            "allegen" => "required",
            "key" => "required",
        ]);

        Allegen::create($formField);

        return back()->with('message', "Allegen Created");
    }

    public function delete($id) {
       Allegen::findOrFail($id)->delete();

       return back()->with('message', "Allegen Deleted");
    }
}
