<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;


// Route::group(['middleware' => ['auth']], function() {


    // Show the user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Show the create form
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    // Store a new item in the cart
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Update a specific item in the cart
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    // Remove a specific item from the cart
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


// });
