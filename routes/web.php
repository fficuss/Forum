<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\AnswerController;

Route::get('/signin', [SignController::class, 'showsignin'])->name('signin');
Route::get('/register', [SignController::class, 'showreg'])->name('register');
Route::post('/register', [SignController::class, 'register'])->name('register.post');
Route::post('/signin', [SignController::class, 'signin'])->name('signin.post');
Route::post('/signout', [SignController::class, 'signout'])->name('signout');

Route::get('/profile', [ProfileController::class, 'showprofile'])->middleware('auth')->name('profile');
Route::get('/editprofile', [ProfileController::class, 'showeditprofile'])->middleware('auth')->name('editprofile');
Route::post('/updateprofile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/fanhome', [MainController::class, 'showmain'])->name('fanhome');
Route::get('/messenger', [MessengerController::class, 'showmesseges']);
Route::post('/send-message', [MessengerController::class, 'sendMessage'])->name('message.send');
Route::post('/send-message/{recipient}', [MessengerController::class, 'sendMessage'])->name('messages.send');
Route::get('/messages/send/{recipient}', [MessengerController::class, 'create'])->name('messages.send');

Route::post('/posts', [MainController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/themes/{theme}', [ThemeController::class, 'show'])->name('themes.show');
Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');

Route::get('/discussions/create', [DiscussionController::class, 'create'])->name('discussions.create');
Route::post('/discussions', [DiscussionController::class, 'store'])->name('discussions.store');
Route::post('/answers/{discussion}', [AnswerController::class, 'store'])->name('answers.store');
Route::post('/replies/{answer}', [AnswerController::class, 'storeReply'])->name('replies.store');
Route::get('/discussions/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); 

Route::get('/search', [MainController::class, 'search'])->name('search');