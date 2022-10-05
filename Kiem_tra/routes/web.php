<?php

use App\Http\Controllers\BookController;
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

Route::prefix('book')->group(function(){
    Route::get('/',[BookController::class,'index'])->name('book.index');
    ////add
    Route::get('/add',[BookController::class,'create'])->name('book.add');
    Route::post('/store',[BookController::class,'store'])->name('book.store');
    ///edit
    Route::get('/edit/{id}',[BookController::class,'edit'])->name('book.edit');
    Route::put('/update/{id}',[BookController::class,'update'])->name('book.update');
    ////xóa
    Route::delete('/delete/{id}',[BookController::class,'destroy'])->name('book.delete');
});
