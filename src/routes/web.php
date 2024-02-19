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

Route::get('/menu', [AuthController::class, 'menu']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/thanks', [AuthController::class, 'thanks']);
Route::get('/done', [AuthController::class, 'done']);

Route::get('/', [ShopController::class, 'index']);
Route::post('/detail/:shop_id={shop_id?}', [ShopController::class, 'shopDetail']);