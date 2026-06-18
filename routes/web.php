<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

//laravel will automaticaly create routes
Route::get('/', function() {
    return view('welcome');
});
Route::resource('applications',ApplicationController::class);
