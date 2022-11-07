<?php

use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NotebookPageController;
use App\Http\Controllers\Notebooks\BookmarkController;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('notebooks', NotebookController::class)->withTrashed();

    Route::prefix('/notebooks/{notebook}')->as('notebooks.')->group(function () {
        Route::patch('/restore', [NotebookController::class, 'restore'])->name('restore')->withTrashed();

        Route::post('/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store')->withTrashed();
        Route::delete('/bookmark/destroy', [BookmarkController::class, 'destroy'])->name('bookmark.destroy')->withTrashed();
    });

    // Route::resource('notebooks.pages', NotebookPageController::class)->scoped([
    //     'page' => 'hashid'
    // ]);
});


require __DIR__ . '/auth.php';
