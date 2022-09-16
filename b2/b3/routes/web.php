<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('admin.layouts.master');
// });
// Route::get('/index', function () {
//     return view('customers.index');
// });
Route::get('/', [TaskController::class,'index'])->name('tasks.index');

Route::get('/add', [TaskController::class,'add'])->name('tasks.add');
// Route::put('/store', [TaskController::class,'store'])->name('tasks.store');
Route::post('/store', [TaskController::class,'store'])->name('tasks.store');

Route::get('/edit/{id}', [TaskController::class,'edit'])->name('tasks.edit');
Route::put('/update/{id}', [TaskController::class,'update'])->name('tasks.update');


Route::delete('/destroy/{id}', [TaskController::class,'destroy'])->name('tasks.destroy');


Route::prefix("categories")->group(function(){
Route::get('/', [CategoriesController::class,'index'])->name('categories.index');
Route::get('/add', [CategoriesController::class,'create'])->name('categories.add');
Route::post('/store', [CategoriesController::class,'store'])->name('categories.store');

Route::get('/edit/{id}', [CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/update/{id}', [CategoriesController::class,'update'])->name('categories.update');

Route::delete('/delete/{id}', [CategoriesController::class,'destroy'])->name('categories.destroy');

});
