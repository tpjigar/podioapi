<?php

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
    return view('welcome');
});
Route::get('podio/auth',[\App\Http\Controllers\PodioController::class, 'auth']);
Route::get('podio/items',[\App\Http\Controllers\PodioController::class, 'Items']);
Route::get('podio/item/create',[\App\Http\Controllers\PodioController::class, 'itemCreate']);
Route::get('podio/item/update/{id}',[\App\Http\Controllers\PodioController::class, 'itemUpdate']);
Route::get('podio/file/upload',[\App\Http\Controllers\PodioController::class, 'fileUpload']);

