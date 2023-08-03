<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlacesController;

/*
|--------------------------------------------------------------------------
| API Routes V1
|--------------------------------------------------------------------------
|
| Version 1
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('places', [PlacesController::class, 'index']);

Route::post('register', [AuthController::class, 'register']);
