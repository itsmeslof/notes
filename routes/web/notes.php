<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\Notes\DeleteController;
use App\Http\Controllers\Notes\SettingsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('notes')->as('notes.')->group(function () {
    Route::get('/', [NoteController::class, 'index'])->name('index');
    Route::post('/', [NoteController::class, 'store'])->name('store');
    Route::get('/create', [NoteController::class, 'create'])->name('create');
    Route::get('/{note:hashid}', [NoteController::class, 'show'])->name('show');
    Route::get('/{note:hashid}/edit', [NoteController::class, 'edit'])->name('edit');
    Route::put('/{note:hashid}', [NoteController::class, 'update'])->name('update');

    Route::get('/{note:hashid}/delete', [DeleteController::class, 'show'])->name('delete.show');
    Route::delete('/{note:hashid}/delete', [DeleteController::class, 'destroy'])->name('delete.confirm');

    Route::get('/{note:hashid}/settings', [SettingsController::class, 'show'])->name('settings.show');
    Route::patch('/{note:hashid}/settings', [SettingsController::class, 'update'])->name('settings.update');
});


Route::get('/public/{hashid}', function () {
})->name('note.share');
