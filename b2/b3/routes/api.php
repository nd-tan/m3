<?php

use App\Http\Controllers\Api\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix("categories")->group(function(){
    Route::get('/', [CategoriesController::class,'index'])->name('categories.index');
    Route::get('/add', [CategoriesController::class,'create'])->name('categories.add');
    Route::post('/store', [CategoriesController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoriesController::class,'edit'])->name('categories.edit');
    Route::put('/update/{id}', [CategoriesController::class,'update'])->name('categories.update');
    Route::delete('/delete/{id}', [CategoriesController::class,'destroy'])->name('categories.destroy');
    });
