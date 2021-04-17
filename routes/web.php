<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::get('/h', function () {
    return view('welcome');
});    
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    //logout by closing the session
    Session::forget('user');
    return redirect('login');
});
Route::post("/login",[UserController::class,'login']);
//Home Page
Route::get("/",[ProductController::class,'index']);
//Get the details of the product using the id
Route::get("/detail/{id}",[ProductController::class,'detail']);
//Search a product in the search bar
Route::get("/search",[ProductController::class,'search']);
//Adding Product to shopping cart by the user
Route::post("/add_to_cart",[ProductController::class,'addToCart']);
//Show the items inside the cart
Route::get("/cartlist",[ProductController::class,'cartList']);
//Deleting products from shopping cart
Route::get("/removecart/{id}",[ProductController::class,'removeCart']);
//Placing order by the user
Route::get("/ordernow",[ProductController::class,'orderNow']);
//After placing the order
Route::post("/orderplace",[ProductController::class,'orderPlace']);
//View the orders by the user
Route::get("/myorders",[ProductController::class,'myOrders']);
// After entering registration details 
Route::post("/register",[UserController::class,'register']);
//Header Button to register 
Route::view('/newregister','register');

Route::view('/error','error');