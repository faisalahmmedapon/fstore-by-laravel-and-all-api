<?php


use App\Http\Controllers\Api\Backend\AuthController;
use App\Http\Controllers\Api\Backend\CategoryController;
use App\Http\Controllers\Api\Backend\LoginController;
use App\Http\Controllers\Api\Backend\ProductController;
use App\Http\Controllers\Api\Backend\RegisterController;
use Illuminate\Support\Facades\Route;


//Route::middleware(['auth:sanctum'])->prefix('backend')->group(function () {
Route::middleware(['cors', 'json.response'])->prefix('backend')->group(function () {


    // for login use this route
    Route::post('login', [LoginController::class, 'login'])->name('logout');

    // admin user register for use this route
    Route::post('/register', [RegisterController::class,'register'])->name('register');

    Route::middleware('auth:api')->group(function () {
        // use this route for logout user
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // for crud by admin or any role admin using backend interface
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('products', ProductController::class);
    });



});

