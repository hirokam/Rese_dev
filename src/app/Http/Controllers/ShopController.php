<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\FavoriteShop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function shopDetail(Request $request, $shop_id)
    {
        $shop_detail = Shop::find($shop_id);
        return view('shop_detail', compact('shop_detail'));
    }

    public function createFavorite(Request $request)
    {
        $shop_id = $request->input('shop_id');
        $user_id = Auth::user()->id;

        $favorite_existence = FavoriteShop::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        if(!$favorite_existence){
            $info = FavoriteShop::create ([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
                'is_active' => true,
            ]);
            return redirect('/');
            // return view('shop_all', compact('favorite_existence'));
        }else{
            if($favorite_existence->is_active) {
                $favorite_existence->update(['is_active' => false]);
            }else{
                $favorite_existence->update(['is_active' => true]);
            }
            return redirect('/');
            // return view('shop_all', compact('favorite_existence'));
        }
    }

    public function myPage()
    {
        $user_name = Auth::user()->name;
        return view('my_page', compact('user_name'));
    }
}
