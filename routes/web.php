<?php

use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('Home');
});

Route::post('/fileUp', [UploadController::class, 'onUpload']);
Route::get('/delete', [DeleteController::class, 'onDelete']);
Route::get('/download/{FolderPath}/{name}', [DownloadController::class, 'onDownload']);
Route::get('/fileList', [DownloadController::class, 'onSelectFileList']);
