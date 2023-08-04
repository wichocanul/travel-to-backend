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

Route::post('register-admin', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::get('places', [PlacesController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function() {

    Route::post('create-place', [PlacesController::class, 'create']);

    Route::match(['put', 'patch'], 'edit-place/{id}', [PlacesController::class, 'update']);

    Route::get('logout', [AuthController::class, 'logout']);

});
