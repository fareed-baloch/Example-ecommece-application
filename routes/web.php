<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


//create page return route
Route::get('/product/create',[ProductController::class,'create']);
//list of all products
Route::get('/product',[ProductController::class,'index']);
//edit page return route
Route::get('/product/edit/{productid}',[ProductController::class,'edit']);
//delete route
Route::get('/product/delete/{id}',[ProductController::class,'destroy']);
//insert form route
Route::post('/product/store',[ProductController::class,'store'])->name('product-create');
//update form route
Route::post('/product/update',[ProductController::class,'update'])->name('product-update');












// category routes
Route::get('/category/create',[CategoryController::class,'create']);
Route::get('/category',[CategoryController::class,'index']);
Route::post('/category/store',[CategoryController::class,'store'])->name('category-create');
Route::get('/category/edit/{catid}',[CategoryController::class,'edit']);

Route::get('/category/delete/{id}',[CategoryController::class,'destroy']);


