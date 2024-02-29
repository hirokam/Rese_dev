<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\FavoriteShop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function shopDetail(Request $request, $shop_id)
    {
        $shop_detail = Shop::find($shop_id);
        return view('shop_detail', compact('shop_detail', 'shop_id'));
    }

    public function createFavorite(Request $request)
    {
        $shop_id = $request->input('shop_id');
        $user_id = Auth::id();

        $favorite_existence = FavoriteShop::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        if(!$favorite_existence){
            $info = FavoriteShop::create ([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
                'is_active' => true,
            ]);
            return redirect('/');
        }else{
            if($favorite_existence->is_active) {
                $favorite_existence->update(['is_active' => false]);
            }else{
                $favorite_existence->update(['is_active' => true]);
            }
            return redirect('/');
        }
    }

    public function myPage()
    {
        $user_id = Auth::id();
        $reservations = Reservation::where('user_id', $user_id)->orderBy('reservation_date', 'asc')->orderBy('reservation_time', 'asc')->get();
        $user_name = Auth::user()->name;
        $shops = Shop::all();
        $favorites = FavoriteShop::where('user_id', $user_id)->where('is_active', 1)->get();
        
        return view('my_page', compact('reservations', 'user_name', 'favorites'));
    }

    public function reservation(Request $request)
    {
        $reservation_info = $request->all();
        $user_id = Auth::id();
        $reservation = Reservation::create([
            'user_id' => $user_id,
            'shop_id' => $request->shop_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'reservation_number' => $request->reservation_number,
        ]);

        return view('done');
    }

    public function remove(Request $request)
    {
        $reservation = Reservation::where('user_id', $request->user_id)->where('shop_id', $request->shop_id)->where('reservation_date', $request->reservation_date)->where('reservation_time', $request->reservation_time)->first()->delete();
        return redirect('/mypage');
    }
}
