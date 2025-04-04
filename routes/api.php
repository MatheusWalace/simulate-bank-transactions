<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register/user', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('/transactions', [\App\Http\Controllers\TransactionController::class, 'store']);
