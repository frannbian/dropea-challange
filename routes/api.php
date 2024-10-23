<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntityController;
use Illuminate\Support\Facades\Route;

Route::get('/{category}', [EntityController::class, 'index']);

Route::resource('entities', EntityController::class)->except([
    'create', 'edit'
]);
Route::resource('categories', CategoryController::class)->only([
    'index', 'show',
]);
