<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// middleware untuk memastikan hanya pengguna yang sudah login yang bisa akses
Route::middleware('auth')->group(function () {
    // lihat
    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    // tambah
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    // edit
    Route::get('/books/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('/books/{id}', [BookController::class, 'update'])->name('books.update');
});

require __DIR__.'/auth.php';
