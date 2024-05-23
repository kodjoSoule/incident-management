<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;
// AuthController
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/auth/test', function () {
    return response()->json(['message' => 'Hello World!']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('user', [AuthController::class, 'getUser'])->middleware('auth:api');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/incidents', [IncidentController::class, 'index']);
    Route::post('/incidents', [IncidentController::class, 'store']);
    Route::get('/incidents/{id}', [IncidentController::class, 'show']);
    Route::put('/incidents/{id}', [IncidentController::class, 'update']);
    Route::delete('/incidents/{id}', [IncidentController::class, 'destroy']);
    Route::post('/incidents/{id}/assign', [IncidentController::class, 'assign']);
    Route::post('/incidents/{id}/status', [IncidentController::class, 'changeStatus']);
});
