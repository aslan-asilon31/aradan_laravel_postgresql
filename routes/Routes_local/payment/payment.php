<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth']], function() {


    Route::get('/payment', [PaymentController::class, 'index']);
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');

});