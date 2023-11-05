<?php


use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('admins', AdminController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});
