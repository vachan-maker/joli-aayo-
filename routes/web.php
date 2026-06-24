<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\ResumeVersionsController;
use Illuminate\Support\Facades\Route;

//laravel will automaticaly create routes

Route::get('/register',[AuthController::class,'index'])->name('register_account');
Route::post('/register',[AuthController::class, 'register'])->name('register_account.store');
Route::get('/login',[AuthController::class,'loginPage'])->name('login.page');

Route::get('/password-reset',[AuthController::class, 'forgotPasswordPage']);
Route::post('/password-reset',[AuthController::class,'forgotPassword'])->name('reset');


Route::post('/login',[AuthController::class,'login'])->name('login');

Route::redirect('/','applications');

//this protects the route so only logged in users can use the page
Route::middleware(['auth'])->group(function() {
    Route::resource('applications',ApplicationController::class);
    Route::resource('resume',ResumeVersionsController::class);
    Route::get('/profile',[Profile::class,'index'])->name('profile');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/resume/{resume}/download', [ResumeVersionsController::class,'download'])->name('resume.download');
    Route::get('/resume/{resume}/view',[ResumeVersionsController::class,'view'])->name('resume.view');
});


Route::post('/friends/add',[FriendController::class, 'add']) ->name('addFriend');