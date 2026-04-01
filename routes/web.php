<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// return string
Route::get('/test', function(){
    return 'Hello World';
});

Route::get('/test2', function(){
    return 'Hello Dunia';
})->name('Sapa');

// redirect
Route::redirect('/test', '/test2');

// route view
Route::view('/greeting', 'greeting');

// route view dengan data
Route::view('/greeting', 'greeting', ['name' => 'Erika']);

// Route dengan parameter
// Route::get('/greeting/{name}', function($name){
//     return view('greeting', ['name' => $name]);
// });

// Route dengan controller -> dikelompokkan
Route::controller(UserController::class)->group(function(){
    Route::get('/greeting', 'index');
    Route::get('/greeting/create', 'create');
});









