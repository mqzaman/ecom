<?php

//use App\Http\Controllers\RestoController;

use App\Http\Controllers\productController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

// Route::get('/',[RestoController::class,'index']);
// Route::get('/list', [RestoController::class,'list']);
// Route::view('add', 'add');
// Route::post('add', [RestoController::class,'add']);
// Route::get('delete/{id}',[RestoController::class,'delete']);
// Route::get('edit/{id}',[RestoController::class,'edit']);
// Route::post('update',[RestoController::class,'update']);

Route::post('/login',[UserController::class,'login']);
Route::get('/',[productController::class,'index']);
Route::get('detail/{id}',[productController::class,'detail']);
Route::get('search',[ProductController::class,'search']);
Route::post('add_to_cart',[productController::class,'addToCart']);