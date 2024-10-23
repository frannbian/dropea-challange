<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntityController;
use Illuminate\Support\Facades\Route;

Route::resource('entities', EntityController::class);
Route::resource('categories', CategoryController::class)->only([
    'index', 'show',
]);
// Route::get('/{category}', [EntityController::class, 'index']);
