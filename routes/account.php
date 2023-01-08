<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('/account')->as('account.')->group(function () {
    Route::get('/', [AccountController::class, 'edit'])->name('edit');
    Route::patch('/', [AccountController::class, 'update'])->name('update');
    Route::patch('/password', [UpdatePasswordController::class, 'update'])->name('password.update');
});
