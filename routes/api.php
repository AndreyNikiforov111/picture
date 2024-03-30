<?php

use App\Http\Controllers\JsonFileController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// т к на сайте нет регистрации авторизации нету авторизации регистрации

Route::post('/json', [JsonFileController::class, 'index']);

Route::post('/json/{id}', [JsonFileController::class, 'show']);
