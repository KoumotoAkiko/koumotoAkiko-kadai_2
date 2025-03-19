<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/products',[ProductController::class,'index'])->name('products');
Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('/puroducts/{id}/update',[ProductController::class, 'update'])->name('products.update');
Route::get('/products/search',[ProductController::class, 'search']);
Route::delete('/products/{id}/delete',[ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/register',[ProductController::class,'create'])->name('products.register');
Route::post('/products/register',[ProductController::class, 'store'])->name('products.store');


