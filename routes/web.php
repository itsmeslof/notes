<?php

use App\CustomMarkdownConverter;
use App\HTMLPurifier;
use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NotebookPageController;
use App\Http\Controllers\Notebooks\BookmarkController;
use App\Models\Notebook;
use App\Models\NotebookPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
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

Route::get('/', function () {
    return redirect()->route('notebooks.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('notebooks', NotebookController::class)->withTrashed();

    Route::prefix('/notebooks/{notebook}')->as('notebooks.')->group(function () {
        Route::patch('/restore', [NotebookController::class, 'restore'])->name('restore')->withTrashed();
        Route::patch('/bookmark', [BookmarkController::class, 'update'])->name('bookmark.update')->withTrashed();
    });

    Route::resource('notebooks.pages', NotebookPageController::class)->withTrashed();

    Route::prefix('/notebooks/{notebook}/pages/{page}')->as('notebooks.pages.')->group(function () {
        Route::patch('/restore', [NotebookPageController::class, 'restore'])->name('restore')->withTrashed();
    });
});

require __DIR__ . '/auth.php';
