<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NoteController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::resource('notes', NoteController::class)->withTrashed(['show', 'edit', 'update']);
Route::patch('/notes/{note}/restore', [NoteController::class, 'restore'])->name('notes.restore');
Route::delete('/notes/{note}/force-delete', [NoteController::class, 'forceDelete'])->name('notes.forceDelete');
