<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to PizzaCoffee API']);
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

// Authorization
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);

// OAuth
Route::prefix('auth')->group(function () {
    Route::get('/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/google/callback', [AuthController::class, 'handleGoogleCallback']);
});

// Menu
Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index']);
    Route::get('/pizza', [MenuController::class, 'getPizzas']);
    Route::get('/coffee', [MenuController::class, 'getCoffee']);
    Route::get('/{id}', [MenuController::class, 'show']);
});

// Protected routes (authorized only)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $request) => response()->json($request->user()));

    // Cart
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::post('/add', [CartController::class, 'addToCart']);
        Route::get('/count', [CartController::class, 'getCartItemCount']);
        Route::delete('/{id}', [CartController::class, 'delete']);
    });

    // Orders
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/create', [OrderController::class, 'create']);
        Route::get('/{id}', [OrderController::class, 'show']);
    });
});
