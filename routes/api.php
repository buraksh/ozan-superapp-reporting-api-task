<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Merchant\UserLoginController;
use App\Http\Controllers\Transaction\DetailController;
use App\Http\Controllers\Transaction\ListController;
use App\Http\Controllers\Transaction\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v3'], function () {
    Route::post('merchant/user/login', UserLoginController::class);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('transactions/report', ReportController::class);

        Route::post('transaction/list', ListController::class);

        Route::post('transaction', DetailController::class);

        Route::post('client', CustomerController::class);
    });
});
