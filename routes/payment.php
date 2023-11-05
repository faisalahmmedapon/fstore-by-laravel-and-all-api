<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


// payments


Route::get('/bkash',[PaymentController::class,'bkash'])->name('bkash');
Route::get('/nagat',[PaymentController::class,'nagat'])->name('nagat');
Route::get('/upay',[PaymentController::class,'upay'])->name('upay');
Route::get('/sure-cash',[PaymentController::class,'sure_cash'])->name('sure-cash');
Route::get('/dbbl-mobile-banking',[PaymentController::class,'dbbl_mobile_banking'])->name('dbbl-mobile-banking');
Route::get('/ipay',[PaymentController::class,'ipay'])->name('ipay');
Route::get('/sslcommerz',[PaymentController::class,'sslcommerz'])->name('sslcommerz');
Route::get('/shurjo-pay',[PaymentController::class,'shurjo_pay'])->name('shurjo-pay');
Route::get('/aamar-pay',[PaymentController::class,'aamar_pay'])->name('aamar-pay');
Route::get('/port-wallet',[PaymentController::class,'port_wallet'])->name('port-wallet');
Route::get('/fast-spring',[PaymentController::class,'fast_spring'])->name('fast-spring');
Route::get('/easy-pay-way',[PaymentController::class,'easy_pay_way'])->name('easy-pay-way');
Route::get('/payoneer',[PaymentController::class,'payoneer'])->name('payoneer');

