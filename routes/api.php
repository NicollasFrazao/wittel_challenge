<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () 
{
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () 
{
    Route::prefix('auth')->group(function () 
    {
        Route::get('/', [App\Http\Controllers\AuthController::class, 'me']);
        Route::get('/me', [App\Http\Controllers\AuthController::class, 'me']);
        Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    });
});
