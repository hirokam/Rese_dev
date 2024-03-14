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

// ユーザー登録後にログイン画面に遷移する為の記述
Route::get('/login', [AuthController::class, 'login'])->name('login');

// ログインしていなくても店舗の一覧表示・メニュー表示・検索ができるようにする記述
Route::get('/', [ShopController::class, 'index']);
Route::get('/menu', [AuthController::class, 'menu']);
Route::post('/search', [ShopController::class, 'search']);

// メニューをクローズするための記述→あまり機能していない
Route::post('/close', [AuthController::class, 'closeMenu']);

// これは多分不要。
Route::post('/detail/:shop_id={shop_id?}', [ReservationController::class, 'shopDetail']);

// ★以下メール認証
// メール認証しないといけないことを通知するための記述
// →'auth.verification.notice'データを作成していないため、これは不要？
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// 届いたメールでアドレスの確認をした際の挙動を記した記述
// 確認したらログイン画面にリダイレクト
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('login');
})->middleware(['auth', 'signed'])->name('verification.verify');

// ユーザーにメールアドレスの確認通知を再送するための記述
// これも不要か？
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// メールアドレスの確認が完了したユーザーがプロフィールページにアクセスするための記述
Route::get('/profile', function () {
})->middleware('verified');

// ユーザー登録後に遷移するページ
Route::view('thanks', 'thanks')->name('thanks');

// ログイン済みのユーザーがアクセスできるページ
Route::middleware('auth')->group(function () {
    // Route::get('/', [ShopController::class, 'index']);
    // Route::get('/menu', [AuthController::class, 'menu']);
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

