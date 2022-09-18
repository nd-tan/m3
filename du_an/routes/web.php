<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PositonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
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
Route::prefix('/')->middleware(['auth', 'revalidate'])->group(function(){

//////////trang chu
Route::get('/', function () {
    return view('admin.home');
})->name('index');

/////////danh muc
Route::prefix('categories')->group(function(){
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    ////add
    Route::get('/add',[CategoryController::class,'add'])->name('category.add');
    Route::post('/store',[CategoryController::class,'store'])->name('category.store');
    ///edit
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/update/{id}',[CategoryController::class,'update'])->name('category.update');
    /////xóa
    Route::delete('/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');
});

///////////sản phẩm
Route::prefix('products')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('product.index');
    ////add
    Route::get('/add',[ProductController::class,'create'])->name('product.add');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');
    ///edit
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/update/{id}',[ProductController::class,'update'])->name('product.update');
    /////xóa
    Route::delete('/delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
    ////xem chi tiết
    Route::get('/show/{id}',[ProductController::class,'show'])->name('product.show');

});

///////nhà cung cấp
Route::prefix('suppliers')->group(function(){
    Route::get('/',[SupplierController::class,'index'])->name('supplier.index');
    ////add
    Route::get('/add',[SupplierController::class,'create'])->name('supplier.add');
    Route::post('/store',[SupplierController::class,'store'])->name('supplier.store');
    ///edit
    Route::get('/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
    Route::put('/update/{id}',[SupplierController::class,'update'])->name('supplier.update');
    /////xóa
    Route::delete('/delete/{id}',[SupplierController::class,'destroy'])->name('supplier.delete');
    ////xem chi tiết
    // Route::get('/show/{id}',[SupplierController::class,'show'])->name('supplier.show');

});
///////chuc vu
Route::prefix('position')->group(function(){
    Route::get('/',[PositonController::class,'index'])->name('position.index');
    ////add
    Route::get('/add',[PositonController::class,'add'])->name('position.add');
    Route::post('/store',[PositonController::class,'store'])->name('position.store');
    // ///edit
    Route::get('/edit/{id}',[PositonController::class,'edit'])->name('position.edit');
    Route::put('/edit/{id}',[PositonController::class,'update'])->name('position.update');
    /////delete
    Route::delete('/delete/{id}',[PositonController::class,'destroy'])->name('position.delete');
});
///////nhân viên
Route::prefix('user')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('user.index');
    ////show
    Route::get('/show/{id}',[UserController::class,'show'])->name('user.show');
    Route::get('/register',[UserController::class,'register'])->name('user.register');
    Route::post('/checkregister',[UserController::class,'checkregister'])->name('user.checkregister');

    // // ///edit
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[UserController::class,'update'])->name('user.update');

    // /////delete
    Route::delete('/delete/{id}',[UserController::class,'destroy'])->name('user.delete');
});

});
Route::prefix('user')->group(function(){

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/checklogin',[UserController::class,'checklogin'])->name('user.checklogin');
Route::get('/logout',[UserController::class,'logout'])->name('user.logout');

});
