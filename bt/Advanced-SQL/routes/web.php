<?php

use App\Http\Controllers\MatHangController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhanVienController;
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

// Route::get('/',[NhaCungCapController::class,'index'])->name('index');
// Route::get('/',[MatHangController::class,'index'])->name('index');
Route::get('/',[NhanVienController::class,'index'])->name('index');
