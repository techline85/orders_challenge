<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/auth', [AuthController::class, 'login'])->name('login');


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('orders', OrderController::class)->only(['index', 'update', 'destroy']);
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    Route::get('reports',[ReportController::class,'generateReport'])->name('reports.generate');
});


Route::resource('orders', OrderController::class)->only(['store', 'show']);