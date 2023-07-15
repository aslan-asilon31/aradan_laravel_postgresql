<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;


Route::group(['middleware' => ['auth']], function() {


    // Show the product
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Show the create form
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    // Store a new item in the cart
    Route::post('/carts', [ProductController::class, 'store'])->name('products.store');

    // Show a specific item in the cart
    Route::get('/products/{cart}', [ProductController::class, 'show'])->name('products.show');

    // Show the edit form for a specific item in the cart
    Route::get('/products/{cart}/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Update a specific item in the cart
    Route::put('/products/{cart}', [ProductController::class, 'update'])->name('products.update');

    // Remove a specific item from the cart
    Route::delete('/products/{cart}', [ProductController::class, 'destroy'])->name('products.destroy');
});
