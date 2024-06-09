<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('users', [UsersController::class, 'index']);
Route::get('users/{user}', [UsersController::class, 'show']);
Route::post('users', [UsersController::class, 'store']);
Route::put('users/{user}', [UsersController::class, 'update']);
Route::delete('users/{user}', [UsersController::class, 'delete']);

