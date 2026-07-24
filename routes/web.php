<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NoteController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
// Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
// Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
// Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
// Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
// Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
// Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');

Route::resource('notes', NoteController::class);