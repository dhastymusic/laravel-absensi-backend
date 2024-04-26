<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

//logout
Route::post('/logout', 'App\Http\Controllers\Api\AuthController@logout')->middleware('auth:sanctum');

//get company
Route::get('/company', 'App\Http\Controllers\Api\CompanyController@show')->middleware('auth:sanctum');

//post attendance
Route::post('/checkin', 'App\Http\Controllers\Api\AttendanceController@checkIn')->middleware('auth:sanctum');
Route::post('/checkout', 'App\Http\Controllers\Api\AttendanceController@checkOut')->middleware('auth:sanctum');
Route::get('/ischeckin', 'App\Http\Controllers\Api\AttendanceController@isCheckIn')->middleware('auth:sanctum');
Route::post('/updateprofile', 'App\Http\Controllers\Api\AuthController@updateProfile')->middleware('auth:sanctum');

//post permission
Route::apiResource('/permission', 'App\Http\Controllers\Api\PermissionController')->middleware('auth:sanctum');

//post note
Route::apiResource('/note', 'App\Http\Controllers\Api\NoteController')->middleware('auth:sanctum');
