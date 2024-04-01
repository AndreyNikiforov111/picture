<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ShowUploadController;

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

Route::post('/image/upload', ImageUploadController::class);

Route::post('/download', DownloadController::class);

Route::get('test', 'App\Http\Controllers\TestController@index');



