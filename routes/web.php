<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\ResumeVersionsController;
use Illuminate\Support\Facades\Route;

//laravel will automaticaly create routes

Route::get('/register',[AuthController::class,'index'])->name('register_account');
Route::post('/register',[AuthController::class, 'register'])->name('register_account.store');
Route::get('/login',[AuthController::class,'loginPage'])->name('login.page');
Route::post('/login',[AuthController::class,'login'])->name('login');


//this protects the route so only logged in users can use the page
Route::middleware(['auth'])->group(function() {
    Route::resource('applications',ApplicationController::class);
    Route::resource('resume',ResumeVersionsController::class);
    Route::get('/profile',[Profile::class,'index']);
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});


