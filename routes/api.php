<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth',[AuthController::class,'login'])->name('login');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}',[ProductController::class,'show']);

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('products',ProductController::class)->except(['index','show']);
});

