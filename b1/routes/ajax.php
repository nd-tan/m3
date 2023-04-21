<?php

use App\Http\Controllers\Ajax\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::get('/autocomplete', [UserController::class, 'autocomplete'])->name('ajax.user.autocomplete');
});
