<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NoteController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');