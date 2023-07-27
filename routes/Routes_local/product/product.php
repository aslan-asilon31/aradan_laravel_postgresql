<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CartController;


Route::group(['middleware' => ['auth']], function() {


    // Show the product
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');

    // Show the create form
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

    // Store a new item in the producr
    Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');

    // Show a specific item in the cart
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

    // Show the edit form for a specific item in the cart
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

    // Update a specific item in the cart
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');

    // Remove a specific item from the cart
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/product-excel', [ProductController::class, 'export_excel'])->name('product.export');

    Route::get('/product-pdf', [ProductController::class, 'export_pdf'])->name('product.pdf');

    Route::get('/product-csv', [ProductController::class, 'export_csv'])->name('product.csv');


    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    
    Route::get('/invoice-print', [CartController::class, 'invoice_print'])->name('invoice.print');

    Route::get('/invoice-generate-pdf', [CartController::class, 'generatePDF']);
});
