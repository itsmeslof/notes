<?php

use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'verified', 'auth.admin'])->as('admin.')->group(function () {
    Route::get('/site-settings', [SiteSettingsController::class, 'index'])->name('site-settings.index');
    Route::put('/site-settings', [SiteSettingsController::class, 'update'])->name('site-settings.update');

    Route::resource('pages', StaticPageController::class)->scoped([
        'page' => 'slug'
    ]);

    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});
