<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanjirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, Ranu Adha';
});

Route::get('/user/{name}', function ($name) {
    return "Nama Saya $name";
});

Route::get('/greet/{name?}', function ($name = 'Guest') {
    return "Halo, $name";
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/about', function () {
    return view('about', ['name' => 'Ranu Adha']);
});

Route::get('/lapor', [BanjirController::class, 'form'])->name('lapor.form');
Route::post('/lapor', [BanjirController::class, 'kirim'])->name('lapor.kirim');