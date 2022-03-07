<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
	Route::get('/user/{id}', function ($id) {
		return User::findOrFail($id);
	});
	Route::get('/users/auth', AuthController::class);
});

Route::post('/sanctum/token', TokenController::class);
