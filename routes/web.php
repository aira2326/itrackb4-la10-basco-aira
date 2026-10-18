<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// ✅ Mga nawawalang route — ito ang dahilan ng error
Route::get('/movies/featured', [MovieController::class, 'featured'])->name('movies.featured');
Route::get('/movies/filter/{genre?}', [MovieController::class, 'filter'])->name('movies.filter');