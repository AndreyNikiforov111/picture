<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ShowUploadController;
use App\Http\Controllers\JsonFileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ShowUploadController::class);

Route::post('/image/upload', ImageUploadController::class)->name('image.upload');

Route::post('/download', DownloadController::class);



