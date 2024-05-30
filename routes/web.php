<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessengerController;


Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signin', [SignController::class, 'showsignin']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/register', [SignController::class, 'showreg']);

Route::get('/fanhome', function () {
    return view('fanhome');
});

Route::get('/fanhome', [MainController::class, 'showmain']);

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile', [ProfileController::class, 'showprofile']);

Route::get('/editprofile', function () {
    return view('editprofile');
});

Route::get('/editprofile', [ProfileController::class, 'showeditprofile']);

Route::get('/messenger', function () {
    return view('messenger');
});

Route::get('/messenger', [MessengerController::class, 'showmesseges']);