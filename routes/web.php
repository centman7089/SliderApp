<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MediaController;

Route::get('/', [MediaController::class, 'index']);


Route::get('/upload', [MediaController::class, 'create']);
Route::post('/upload', [MediaController::class, 'store']);




