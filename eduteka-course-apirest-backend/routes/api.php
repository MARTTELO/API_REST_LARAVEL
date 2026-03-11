<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/users', [UserController::class, 'index']);
// Route::post('users/create', [UserController::class, 'store']);
// Route::get('users/{id}', [UserController::class, 'show']);
// Route::put('users/{id}', [UserController::class, 'update']);
// Route::delete('users/{id}', [UserController::class, 'destroy']);    
Route::apiResource('/users', UserController::class);