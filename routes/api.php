<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Mobile\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1/mobile')->group(function (): void {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::prefix('/post')->group(function (): void {
        Route::get('/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
        Route::get('/', [PostController::class, 'index']);
    });

    Route::prefix('/category')->group(function (): void {
        Route::get('/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+');
        Route::get('/', [CategoryController::class, 'index']);
    });

    Route::prefix('/author')->group(function (): void {
        Route::get('/', [UserController::class, 'getAuthors']);
    });
});

Route::prefix('/v1/admin')->group(function (): void {
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    })->middleware('auth:sanctum');

//    Route::post('/auth/register', [AuthController::class, 'register']);
//    Route::post('/auth/login', [AuthController::class, 'login']);
//    Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::prefix('/post')->group(function (): void {
        Route::get('/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
        Route::get('/', [\App\Http\Controllers\Admin\PostController::class, 'index']);
    });

    Route::prefix('/category')->group(function (): void {
        Route::get('/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+');
        Route::get('/', [CategoryController::class, 'index']);
    });

    Route::prefix('/user')->group(function (): void {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index']);
    });
});
