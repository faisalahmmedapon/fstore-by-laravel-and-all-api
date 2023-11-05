<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SiteSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::middleware(['auth'])->prefix('/admin/')->group(function () {


    Route::resource('categories', CategoryController::class);




    // system setting here
    Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings');
    Route::post('/update-settings', [SiteSettingController::class, 'update'])->name('update.setting');
});
