<?php

use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'verified', 'auth.admin'])->as('admin.')->group(function () {
    Route::get('/site-settings', [SiteSettingsController::class, 'index'])->name('site-settings.index');
    Route::put('/site-settings', [SiteSettingsController::class, 'update'])->name('site-settings.update');

    Route::resource('pages', StaticPageController::class)->scoped([
        'page' => 'slug'
    ]);
});
