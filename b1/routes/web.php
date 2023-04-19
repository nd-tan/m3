<?php

use App\Http\Controllers\checkmailController;
use App\Http\Controllers\coculatecontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\transaltecontroller;
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
// Route::post('index',[coculatecontroller::class,'index'])->name("index");
// Route::post('coculate',[coculatecontroller::class,'coculate'])->name("coculate");

// Route::get('translate/index',[transaltecontroller::class,'index'])->name("translate.index");
// Route::post('translate/dich',[transaltecontroller::class,'dich'])->name("dich");

Route::get('/',[logincontroller::class,'index'])->name("login.index");
Route::post('/check',[logincontroller::class,'check'])->name("check");
Route::get('/logout',[logincontroller::class,'logout'])->name("logout");

Route::get('/register',[logincontroller::class,'register'])->name("register");
Route::get('/create',[logincontroller::class,'create'])->name("create");
Route::post('/check-request',[logincontroller::class,'checkRequest'])->name("check_request");

// Route::get("email",[checkmailController::class,'index'])->name("email");
// Route::post("email/check",[checkmailController::class,'check'])->name("check.email");

