<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UniversitarioController;
use App\Http\Controllers\Api\StoreProductController;
use App\Http\Controllers\Api\MarketplaceProductController;
use App\Http\Controllers\Api\AnuncioController;
use App\Http\Controllers\WhatsAppGroupController;

// Authentication routes
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('me', [AuthController::class, 'me']);

// Universitarios routes
Route::apiResource('universitarios', UniversitarioController::class);

// Store products routes
Route::apiResource('store/products', StoreProductController::class);
Route::get('store/categories/{category}/products', [StoreProductController::class, 'byCategory']);

// Marketplace products routes
Route::apiResource('marketplace/products', MarketplaceProductController::class);
Route::post('marketplace/products/{id}/purchase', [MarketplaceProductController::class, 'purchase']);

// Anuncios routes
Route::apiResource('anuncios', AnuncioController::class);
Route::get('anuncios/carrera/{carrera}', [AnuncioController::class, 'byCarrera']);
Route::get('anuncios/categoria/{categoria}', [AnuncioController::class, 'byCategoria']);

// WhatsApp groups routes
Route::get('whatsapp-groups', [WhatsAppGroupController::class, 'index']);
