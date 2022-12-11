<?php

use App\Http\Controllers\Admin\SiteSettingsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth.admin'])->as('admin.')->group(function () {
    Route::get('/site-settings', [SiteSettingsController::class, 'index'])->name('site-settings.index');
    Route::put('/site-settings', [SiteSettingsController::class, 'update'])->name('site-settings.update');

    Route::resource('pages', AdminStaticPageController::class);
});
