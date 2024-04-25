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
