<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\CompanyController;
use App\http\Controllers\AttendanceController;
use App\http\Controllers\PermissionController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('home', function(){
        return view('pages.dashboard');})->name('home');

    Route::resource('users', UserController::class);


    Route::resource('companies', CompanyController::class);

    Route::resource('attendances', AttendanceController::class);

    Route::resource('permissions', PermissionController::class);
});
