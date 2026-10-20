<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');
// ✅ Ito ang nawala — ilagay ito
Route::get('/books/category/{cat}', [BookController::class, 'category'])->name('books.category');