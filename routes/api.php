<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// avand in vedere ca avem o structura standard putem folosi apiResource, si vor fi generate toate rutele automat
Route::apiResource('/products', ProductController::class);
Route::apiResource('/orders', OrderController::class);


Route::get('/cart', [CartController::class, 'show']);
Route::post('/cart/item', [CartItemController::class, 'add']);
Route::delete('/cart/item', [CartItemController::class, 'remove']);



Route::put('/profile/{id}', [ProfileController::class, 'update']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'store']);
Route::delete('/profile/{id}', [ProfileController::class, 'destroy']);


