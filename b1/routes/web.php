<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\checkmailController;
use App\Http\Controllers\coculatecontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\transaltecontroller;
use App\Http\Controllers\UserController;
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

Route::get('/index', function () {
    return view('welcome');
})->name('index');


Route::get('/',[UserController::class,'index'])->name("user.index");
Route::get('/auth',[AuthController::class,'index'])->name("auth.index");
Route::get('/product',[ProductController::class,'store'])->name("product.store");
Route::get('/autocomplete', [UserController::class, 'autocomplete'])->name('user.autocomplete');




