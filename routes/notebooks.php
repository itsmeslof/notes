<?php

use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NotebookPageController;
// use App\Http\Controllers\Notebooks\BookmarkController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('notebooks', NotebookController::class)->withTrashed();

    Route::prefix('/notebooks/{notebook}')->as('notebooks.')->group(function () {
        Route::patch('/restore', [NotebookController::class, 'restore'])->name('restore')->withTrashed();

        // Route::patch('/bookmark', [BookmarkController::class, 'update'])->name('bookmark.update')->withTrashed();
    });

    Route::resource('notebooks.pages', NotebookPageController::class)->withTrashed();

    Route::prefix('/notebooks/{notebook}/pages/{page}')->as('notebooks.pages.')->group(function () {
        Route::patch('/restore', [NotebookPageController::class, 'restore'])->name('restore')->withTrashed();
    });
});
