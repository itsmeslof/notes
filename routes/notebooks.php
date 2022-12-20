<?php

use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NotebookPageController;
use App\Http\Controllers\NotebookShareLinkController;
use App\Http\Controllers\SharedNotebook\PageController as SharedNotebookPageController;
// use App\Http\Controllers\Notebooks\BookmarkController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('notebooks', NotebookController::class)->withTrashed();

    Route::prefix('/notebooks/{notebook}')->as('notebooks.')->group(function () {
        Route::patch('/restore', [NotebookController::class, 'restore'])->name('restore')->withTrashed();

        Route::get('/share', [NotebookShareLinkController::class, 'index'])->name('share.index');
        Route::get('/share/create', [NotebookShareLinkController::class, 'create'])->name('share.create');
        Route::post('/share', [NotebookShareLinkController::class, 'store'])->name('share.store');
        Route::get('/share/{notebook_share_link:hashid}/edit', [NotebookShareLinkController::class, 'edit'])->name('share.edit');
        Route::put('/share/{notebook_share_link:hashid}', [NotebookShareLinkController::class, 'update'])->name('share.update');
        Route::delete('/share/{notebook_share_link:hashid}', [NotebookShareLinkController::class, 'destroy'])->name('share.destroy');

        // Route::patch('/bookmark', [BookmarkController::class, 'update'])->name('bookmark.update')->withTrashed();
    });

    Route::resource('notebooks.pages', NotebookPageController::class)->withTrashed();

    Route::prefix('/notebooks/{notebook}/pages/{page}')->as('notebooks.pages.')->group(function () {
        Route::patch('/restore', [NotebookPageController::class, 'restore'])->name('restore')->withTrashed();
    });
});

Route::get(
    '/shared/{notebook_share_link:hashid}',
    [NotebookShareLinkController::class, 'show']
)->name('shared-notebook.show');

Route::get(
    '/shared/{notebook_share_link:hashid}/{pageHashId}',
    [SharedNotebookPageController::class, 'show']
)->name('shared-notebook.page.show');
