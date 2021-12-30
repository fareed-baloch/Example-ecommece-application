<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
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




//create page return route
Route::get('admin/product/create',[ProductController::class,'create']);
//list of all products
Route::get('admin/product',[ProductController::class,'index']);
//edit page return route
Route::get('admin/product/edit/{productid}',[ProductController::class,'edit']);
//delete route
Route::get('admin/product/delete/{id}',[ProductController::class,'destroy']);
//insert form route
Route::post('admin/product/store',[ProductController::class,'store'])->name('product-create');
//update form route
Route::post('admin/product/update',[ProductController::class,'update'])->name('product-update');
Route::get('/category/{id}',[ProductController::class,'by_cat']);

Route::get('admin/category/create',[CategoryController::class,'create']);
//category Create ROute
Route::post('admin/category/store',[CategoryController::class,'store'])->name('category-create');

Route::get('admin/category',[CategoryController::class,'index']);
Route::get('admin/category/edit/{categoryid}',[CategoryController::class,'edit']);
Route::post('admin/category/update',[CategoryController::class,'update'])->name('category-update');
//delete route
Route::get('admin/category/delete/{id}',[CategoryController::class,'destroy']);
//product all route
Route::get('/allproducts',[ProductController::class,'all']);
Route::get('/product/{id}',[ProductController::class,'single']);
Route::get('/',[ProductController::class,'home']);
Route::get('/about',[ProductController::class,'about']);
Route::post('/comment/add',[ProductController::class,'comment'])->name('comment-add');


//cart Routes
Route::post('/cart/add',[CartController::class,'addToCart'])->name('cart-add');


Route::post('/cart/remove',[CartController::class,'removeCart'])->name('cart-remove');
Route::post('/cart/update',[CartController::class,'updateCart'])->name('cart-update');
Route::get('/cart',[CartController::class,'cartList']);

Route::get('/cart/removeall',[CartController::class,'clearAllCart']);


Route::get('/checkout',[OrdersController::class,'checkout']);

Route::get('/orderConfirmed/{id}',[OrdersController::class,'orderConfirmed']);
Route::post('/checkout/processOrder',[OrdersController::class,'processOrder'])->name('order-process');
