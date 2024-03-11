<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteShopsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopReviewController;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
})->middleware('verified');

Route::view('thanks', 'thanks')->name('thanks');

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/menu', [AuthController::class, 'menu']);
    Route::post('/close', [AuthController::class, 'closeMenu']);
    Route::get('/mypage', [AuthController::class, 'myPage']);
    Route::get('/visited', [AuthController::class, 'visitedShop']);
    Route::post('/visited', [AuthController::class, 'visitedShop']);
    Route::post('/create_favorite', [FavoriteShopsController::class, 'createFavorite']);
    Route::post('/delete_favorite', [FavoriteShopsController::class, 'myPageDeleteFavorite']);
    Route::get('/detail/:shop_id={shop_id?}', [ReservationController::class, 'shopDetail']);
    Route::post('/detail/:shop_id={shop_id?}', [ReservationController::class, 'shopDetail']);
    Route::post('/reservation', [ReservationController::class, 'reservation']);
    // Route::get('/update', [ReservationController::class, 'updateView']);
    Route::post('/update', [ReservationController::class, 'updateView']);
    Route::patch('/reservation/update', [ReservationController::class, 'update']);
    Route::delete('/delete', [ReservationController::class, 'remove']);
    Route::post('review_form', [ShopReviewController::class, 'review']);
    Route::post('review_post', [ShopReviewController::class, 'reviewCreate']);
});

Route::get('/login', [AuthController::class, 'login']);
Route::get('/', [ShopController::class, 'index']);
Route::get('/menu', [AuthController::class, 'menu']);
Route::post('/close', [AuthController::class, 'closeMenu']);
Route::post('/detail/:shop_id={shop_id?}', [ReservationController::class, 'shopDetail']);

Route::post('/search', [ShopController::class, 'search']);