<?php

namespace App\Http\Controllers;

use App\Models\FavoriteShop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteShopsController extends Controller
{
    public function createFavorite(Request $request)
    {
        $shop_id = $request->input('shop_id');
        $user_id = Auth::id();

        $favorite_existence = FavoriteShop::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        if(!$favorite_existence) {
            $info = FavoriteShop::create ([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
                'is_active' => true,
            ]);

            return redirect('/');
        }

        $favorite_existence->update(['is_active' => !$favorite_existence->is_active]);

        return redirect('/');
    }

    public function myPageDeleteFavorite(Request $request)
    {
        $shop_id = $request->input('shop_id');
        $user_id = Auth::id();

        $favorite_existence = FavoriteShop::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        if($favorite_existence->is_active) {
            $favorite_existence->update(['is_active' => false]);
            }

        return redirect('/mypage');
    }
}
