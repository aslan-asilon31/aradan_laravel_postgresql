<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;



Route::get('/product', [ProductController::class, 'index']);
