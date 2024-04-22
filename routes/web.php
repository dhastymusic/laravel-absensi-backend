<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('home', function(){
        return view('pages.dashboard');})->name('home');

    Route::resource('users', UserController::class);
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
});
