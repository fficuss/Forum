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
use App\Http\Controllers\AdminController;

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

Route::get('/admin/dousers', [AdminController::class, 'showdoUsers'])->name('admindousers');
Route::get('/admin/doposts', [AdminController::class, 'showdoPosts'])->name('admindoposts');
Route::get('/admin/dothemes', [AdminController::class, 'showdoTheme'])->name('admindothemes');

Route::delete('/admin/deletediscussion/{id}', [AdminController::class, 'deleteDiscussion'])->name('discussions.delete');


Route::get('/admin', [AdminController::class, 'view'])->name('admin');
Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('adminusers');
Route::get('/admin/posts', [AdminController::class, 'showPosts'])->name('adminposts');
Route::get('/admin/themes', [AdminController::class, 'showThemes'])->name('adminthemes');
Route::get('/admin/addtheme', [AdminController::class, 'showAddTheme'])->name('adminthemesadd');
Route::post('/admin/addtheme', [AdminController::class, 'storeTheme'])->name('themes.store');
Route::get('/admin/changetheme', [AdminController::class, 'showChangeTheme'])->name('adminthemeschange');
Route::get('/admin/deletetheme', [AdminController::class, 'showDeleteTheme'])->name('adminthemesdelete');
Route::delete('/admin/deletetheme/{id}', [AdminController::class, 'deleteTheme'])->name('themes.delete');
Route::get('/admin/adduser', [AdminController::class, 'showAddUser'])->name('adminusersadd');
Route::post('/admin/adduser', [AdminController::class, 'storeUser'])->name('adminusers.store');
Route::get('/admin/deleteuser', [AdminController::class, 'showDeleteUser'])->name('adminusersdelete');
Route::delete('/admin/deleteuser/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
Route::get('/admin/changeuser', [AdminController::class, 'showChangeUser'])->name('adminuserschange');
Route::get('/admin/changecontent', [AdminController::class, 'showChangePost'])->name('adminpostschange');
Route::get('/admin/deletepost', [AdminController::class, 'showDeletePost'])->name('adminpostsdelete');
Route::delete('/admin/deletepost/{id}', [AdminController::class, 'deletePost'])->name('posts.delete');

Route::get('/admin/changeuser/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
Route::put('/admin/changeuser/{id}', [AdminController::class, 'updateUser'])->name('users.update');

Route::get('/admin/changetheme/{id}/edit', [AdminController::class, 'editTheme'])->name('themes.edit');
Route::put('/admin/changetheme/{id}', [AdminController::class, 'updateTheme'])->name('themes.update');

Route::get('/admin/changecontent', [AdminController::class, 'showChangeContent'])->name('admincontentschange');
Route::get('/admin/changepost/{id}/edit', [AdminController::class, 'editPost'])->name('posts.edit');
Route::put('/admin/changepost/{id}', [AdminController::class, 'updatePost'])->name('posts.update');
Route::get('/admin/changediscussion/{id}/edit', [AdminController::class, 'editDiscussion'])->name('discussions.edit');
Route::put('/admin/changediscussion/{id}', [AdminController::class, 'updateDiscussion'])->name('discussions.update');
Route::put('/admin/changepost/{id}', [AdminController::class, 'updatePost'])->name('posts.update');
Route::put('/admin/changediscussion/{id}', [AdminController::class, 'updateDiscussion'])->name('discussions.update');
Route::put('/admin/changediscussion/{id}', [AdminController::class, 'updateDiscussion'])->name('discussions.update');


