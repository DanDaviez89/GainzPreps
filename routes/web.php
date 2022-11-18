<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\allegenController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("index");

Route::get('/menu/show', [menuController::class, 'show']);
Route::get('/menu/{id}/show', [menuController::class, 'showSingle']);

Route::get('/cart', function () {
    return view('cart.cart');
});

Route::group(['prefix' => '/admin', 'middleware' => 'adminCheck'], function () {
    Route::Get('/index', [AdminController::class, 'index']);
    Route::get('/allegen', [allegenController::class, 'index']);
    Route::post('/allegen/create', [allegenController::class, 'create']);
    Route::post('/allegen/{id}/delete', [allegenController::class, 'delete']);

    Route::group(['prefix' => '/menu', [menuController::class]], function () {
        Route::get('/create', [menuController::class, 'createForm']);
        Route::post('/create', [menuController::class, 'submitCreate']);
        Route::post('/{id}/delete', [menuController::class, 'delete']);
        Route::get('/{id}/edit', [menuController::class, 'editForm']);
        Route::post('/{id}/edit', [menuController::class, 'postEdit']);
    });
});

Route::group(['prefix' => '/user', [userController::class]], function () {
    Route::get('/account', [userController::class, 'account']);
    Route::get('/register', [userController::class, 'registerForm'])->middleware("guest");
    Route::post('/register', [userController::class, 'submitRegister'])->middleware("guest");
    Route::get('/login', [userController::class, 'loginForm'])->middleware("guest");
    Route::post('/login', [userController::class, 'submitLogin'])->middleware("guest");
    Route::get('{id}/edit', [userController::class, 'edit'])->middleware("auth");
    Route::post('{id}/edit', [userController::class, 'submitEdit'])->middleware("auth");
    Route::post('/logout', [userController::class, 'logout'])->middleware("auth");
    Route::post('/create-review/{id}', [userController::class, 'postReview'])->middleware('auth');
});
