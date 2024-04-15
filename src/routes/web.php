<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteShopsController;
use App\Http\Controllers\NotificationEmailController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopReviewController;
use App\Http\Controllers\StoreRepresentativeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

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

// メニュー表示
Route::get('/menu', [AuthController::class, 'menu']);

// ★メール認証の通知
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// 届いたメールでアドレスの確認をした際の挙動を記した記述
// 確認したらログイン画面にリダイレクト
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('login');
})->middleware(['auth', 'signed'])->name('verification.verify');

// ユーザー登録後に遷移するページ
Route::view('thanks', 'thanks')->name('thanks');

// ログイン済みのユーザーがアクセスできるページ
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::middleware('admin')->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::post('/register', [AdminController::class, 'adminRegister']);
            Route::get('/send_mail', [NotificationEmailController::class, 'sendMail']);
        });
    });
    Route::middleware('store')->group(function () {
        Route::prefix('/store-representative')->group(function () {
            Route::post('/register', [StoreRepresentativeController::class, 'register']);
            Route::get('/reservation', [StoreRepresentativeController::class, 'reservationCheck']);
        });
    });
    Route::post('/search', [ShopController::class, 'search']);
    Route::get('/mypage', [AuthController::class, 'myPage']);
    Route::get('/visited', [AuthController::class, 'visitedShop']);
    Route::post('/visited', [AuthController::class, 'visitedShop']);
    Route::post('/create_favorite', [FavoriteShopsController::class, 'createFavorite']);
    Route::post('/delete_favorite', [FavoriteShopsController::class, 'myPageDeleteFavorite']);
    Route::get('/detail/:shop_id={shop_id?}', [ReservationController::class, 'shopDetail']);
    Route::post('/detail/:shop_id={shop_id?}', [ReservationController::class, 'shopDetail']);
    Route::post('/reservation', [ReservationController::class, 'reservation']);
    Route::post('/update', [ReservationController::class, 'updateView']);
    Route::patch('/reservation/update', [ReservationController::class, 'update']);
    Route::delete('/delete', [ReservationController::class, 'remove']);
    Route::post('/review_form', [ShopReviewController::class, 'review']);
    Route::post('/review_post', [ShopReviewController::class, 'reviewCreate']);
    Route::post('/QRcode', [QrCodeController::class, 'index']);
    Route::post('/charge', [StripeController::class, 'charge']);
});