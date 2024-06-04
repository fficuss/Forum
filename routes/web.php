<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

// Other routes...

Route::get('/signin', [SignController::class, 'showsignin'])->name('signin');
Route::get('/register', [SignController::class, 'showreg'])->name('register');
Route::post('/register', [SignController::class, 'register'])->name('register.post');
Route::post('/signin', [SignController::class, 'signin'])->name('signin.post');
Route::post('/signout', [SignController::class, 'signout'])->name('signout');

// Define the profile routes using controllers
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'showprofile'])->middleware('auth')->name('profile');
Route::get('/editprofile', [ProfileController::class, 'showeditprofile'])->middleware('auth')->name('editprofile');
Route::post('/updateprofile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

// Route for viewing other users' profiles
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Define other routes
Route::get('/fanhome', [MainController::class, 'showmain'])->name('fanhome');
Route::get('/messenger', [MessengerController::class, 'showmessages']);
Route::get('/send-message/{recipient}', [MessengerController::class, 'create'])->name('messages.send');
Route::post('/send-message', [MessengerController::class, 'sendMessage'])->name('message.send');
Route::post('/messages/send/{recipient}', [MessengerController::class, 'create'])->name('messages.send');



Route::post('/posts', [MainController::class, 'store'])->name('posts.store');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Like routes
Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');
