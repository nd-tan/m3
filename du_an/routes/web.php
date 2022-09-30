<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PositionController;
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
    ////xóa
    Route::delete('/deleted/{id}',[CategoryController::class,'deleted'])->name('category.deleted');
    /////xóa mềm
    Route::delete('/destroy/{id}',[CategoryController::class,'destroy'])->name('category.delete');
    Route::get('/softdelete',[CategoryController::class,'softdelete'])->name('category.softdelete');
    Route::get('/restore/{id}',[CategoryController::class,'retrieve'])->name('category.restore');
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
    Route::delete('/deleted/{id}',[ProductController::class,'deleted'])->name('product.deleted');
    /////xóa mềm
    Route::delete('/delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
    Route::get('/softdelete',[ProductController::class,'softdelete'])->name('product.softdelete');
    Route::get('/restore/{id}',[ProductController::class,'retrieve'])->name('product.restore');
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
    Route::delete('/deleted/{id}',[SupplierController::class,'deleted'])->name('supplier.deleted');
    ///xóa mềm
    Route::delete('/delete/{id}',[SupplierController::class,'destroy'])->name('supplier.delete');
    Route::get('/softdelete',[SupplierController::class,'softdelete'])->name('supplier.softdelete');
    Route::get('/restore/{id}',[SupplierController::class,'retrieve'])->name('supplier.restore');
    ////xem chi tiết
    // Route::get('/show/{id}',[SupplierController::class,'show'])->name('supplier.show');

});
///////chuc vu
Route::prefix('position')->group(function(){
    Route::get('/',[PositionController::class,'index'])->name('position.index');
    ////add
    Route::get('/add',[PositionController::class,'add'])->name('position.add');
    Route::post('/store',[PositionController::class,'store'])->name('position.store');

    // ///edit
    Route::get('/edit/{id}',[PositionController::class,'edit'])->name('position.edit');
    Route::put('/edit/{id}',[PositionController::class,'update'])->name('position.update');
    /////delete
    Route::delete('/deleted/{id}',[PositionController::class,'deleted'])->name('position.deleted');
    ////xóa mềm
    Route::delete('/delete/{id}',[PositionController::class,'destroy'])->name('position.delete');
    Route::get('/softdelete',[PositionController::class,'softdelete'])->name('position.softdelete');
    Route::get('/restore/{id}',[PositionController::class,'retrieve'])->name('position.restore');

    Route::get('/detail/{id}',[PositionController::class,'detail'])->name('position.detail');
    Route::put('/update_position/{id}',[PositionController::class,'update_position'])->name('position.update_position');
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
    /////delete
    Route::delete('/deleted/{id}',[UserController::class,'deleted'])->name('user.deleted');
    // /////delete mềm
    Route::delete('/delete/{id}',[UserController::class,'destroy'])->name('user.delete');
    Route::get('/softdelete',[UserController::class,'softdelete'])->name('user.softdelete');
    Route::get('/restore/{id}',[UserController::class,'retrieve'])->name('user.restore');
    /////change info
    Route::post('/updateinfo/{id}',[UserController::class,'update_info'])->name('user.update_info');
    Route::post('/updatepassword',[UserController::class,'change_password'])->name('user.updatepassword');
    Route::get('/info',[UserController::class,'info'])->name('user.info');

    Route::post('/search',[UserController::class,'search'])->name('user.search');
});

});
Route::prefix('user')->group(function(){
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/checklogin',[UserController::class,'checklogin'])->name('user.checklogin');
Route::get('/logout',[UserController::class,'logout'])->name('user.logout');

});
