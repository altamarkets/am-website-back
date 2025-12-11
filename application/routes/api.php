<?php

use App\Http\Controllers\API\V1\AuthController__1;
use App\Http\Controllers\API\V1\FormController__1;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('token', [AuthController__1::class, 'getToken']);
    });
    Route::middleware(['token'])->prefix('form')->group(function () {
        Route::post('submit', [FormController__1::class, 'submit']);
    });
});
