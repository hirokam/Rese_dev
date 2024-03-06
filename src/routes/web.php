<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteShopsController;

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

Route::view('thanks', 'thanks')->name('thanks');

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/menu', [AuthController::class, 'menu']);
    Route::get('/close', [AuthController::class, 'closeMenu']);
    Route::get('/mypage', [ShopController::class, 'myPage']);
    Route::post('/detail/:shop_id={shop_id?}', [ShopController::class, 'shopDetail']);
    Route::post('/create_favorite', [FavoriteShopsController::class, 'createFavorite']);
    Route::post('/reservation', [ReservationController::class, 'reservation']);
    Route::post('/update', [ReservationController::class, 'updateView']);
    Route::patch('/reservation/update', [ReservationController::class, 'update']);
    Route::get('/done', [AuthController::class, 'done']);
    Route::delete('/delete', [ReservationController::class, 'remove']);
    Route::post('/delete_favorite', [FavoriteShopsController::class, 'myPageDeleteFavorite']);
});

Route::get('/login', [AuthController::class, 'login']);
Route::get('/', [AuthController::class, 'index']);
Route::get('/menu', [AuthController::class, 'menu']);
Route::get('/close', [AuthController::class, 'closeMenu']);
Route::post('/detail/:shop_id={shop_id?}', [ShopController::class, 'shopDetail']);

Route::post('/search', [AuthController::class, 'search']);