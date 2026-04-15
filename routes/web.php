<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route untuk menampilkan data langsung dari model
Route::get('/users', function() {
    $users = User::all(); // ambil data user melalui model
    return view('users.index', compact('users'));
});









