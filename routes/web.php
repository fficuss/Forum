<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessengerController;

Route::get('/signin', [SignController::class, 'showsignin'])->name('signin');
Route::get('/register', [SignController::class, 'showreg'])->name('register');
Route::post('/register', [SignController::class, 'register'])->name('register.post');
Route::post('/signin', [SignController::class, 'signin'])->name('signin.post');
Route::post('/signout', [SignController::class, 'signout'])->name('signout');

// Define the profile routes using controllers
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'showprofile'])->middleware('auth')->name('profile');
Route::get('/editprofile', [ProfileController::class, 'showeditprofile'])->middleware('auth')->name('editprofile');
Route::post('/updateprofile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

// Define other routes
Route::get('/fanhome', [MainController::class, 'showmain']);
Route::get('/messenger', [MessengerController::class, 'showmesseges']);
Route::post('/posts', [MainController::class, 'store'])->name('posts.store');

