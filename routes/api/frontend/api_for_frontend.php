<?php


use App\Http\Controllers\Api\Frontend\LoginController;
use App\Http\Controllers\Api\Frontend\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('login',LoginController::class);
Route::apiResource('register',RegisterController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
