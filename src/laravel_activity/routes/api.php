<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

//Route::resource('/activities', 'ActivityController', [
//    'except' => ['edit', 'show', 'store']
//]);

Route::resource('activities', ActivityController::class);
