<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
require __DIR__ . '/role.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/payment.php';

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
