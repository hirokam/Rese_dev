<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;

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
    
});


Route::post('/create_favorite', [ShopController::class, 'createFavorite']);

Route::get('/thanks', [AuthController::class, 'thanks']);
Route::get('/done', [AuthController::class, 'done']);

Route::post('/detail/:shop_id={shop_id?}', [ShopController::class, 'shopDetail']);

Route::get('/mypage', [AuthController::class, 'myPage']);