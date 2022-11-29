<?php

namespace App\Http\Controllers;

use App\Models\Review;
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

    public function viewReviews() {
        $reviews = Review::all();
        $menuItems = menuItem::all();

        return view ('admin.Reviews.index', [
            'reviews' => $reviews,
            'menuItems' => $menuItems 
        ]);
    }
}
