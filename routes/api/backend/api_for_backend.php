<?php


use App\Http\Controllers\Api\Backend\LoginController;
use App\Http\Controllers\Api\Backend\RegisterController;
use App\Http\Controllers\Api\Backend\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('login',LoginController::class);
Route::apiResource('register',RegisterController::class);


//Route::middleware(['auth:sanctum'])->prefix('backend')->group(function () {
Route::prefix('backend')->group(function () {

    // for crud by admin or any role admin using backend interface
    Route::apiResource('categories',CategoryController::class);

});

