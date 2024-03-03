<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteShopsController;
use App\Http\Controllers\ReservationController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/menu', [AuthController::class, 'menu']);
    Route::get('/mypage', [ShopController::class, 'myPage']);
    Route::post('/detail/:shop_id={shop_id?}', [ShopController::class, 'shopDetail']);
    Route::post('/create_favorite', [FavoriteShopsController::class, 'createFavorite']);
    Route::post('/reservation', [ReservationController::class, 'reservation']);
    Route::get('/done', [AuthController::class, 'done']);
    Route::delete('/delete', [ReservationController::class, 'remove']);
    Route::post('/delete_favorite', [FavoriteShopsController::class, 'myPageDeleteFavorite']);
});

Route::get('/', [AuthController::class, 'index']);
Route::get('/menu', [AuthController::class, 'menu']);
Route::post('/detail/:shop_id={shop_id?}', [ShopController::class, 'shopDetail']);

Route::get('/thanks', [AuthController::class, 'thanks']);

Route::post('/search', [AuthController::class, 'search']);