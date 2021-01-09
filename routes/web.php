<?php

//use App\Http\Controllers\RestoController;

use App\Http\Controllers\ProductController;
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

Route::view('register','register');
//Route::get('register',[UserController::class,'register']);
Route::post('register',[UserController::class,'register']);
Route::get('editprofile/{id}',[UserController::class,'editProfile']);
Route::post('updateprofile',[UserController::class,'updateProfile']);
Route::post('/login',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::get('search',[ProductController::class,'search']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('removecart/{cart_id}',[ProductController::class,'removeCart']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('orderplace',[ProductController::class,'orderPlace']);
Route::get('myorders',[ProductController::class,'myOrders']);