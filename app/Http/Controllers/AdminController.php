<?php

namespace App\Http\Controllers;

use App\Models\menuItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $menuItems = menuItem::all();

        return view('admin.index', [
            'menuItems' => $menuItems
        ]);
    }
}
