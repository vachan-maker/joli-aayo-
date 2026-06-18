<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ResumeVersionsController;
use Illuminate\Support\Facades\Route;

//laravel will automaticaly create routes
Route::get('/', function() {
    return view('welcome');
});
Route::resource('applications',ApplicationController::class);
Route::resource('resume',ResumeVersionsController::class);
