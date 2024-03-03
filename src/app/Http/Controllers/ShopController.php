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

    public function myPage()
    {
        $user_id = Auth::id();
        $reservations = Reservation::where('user_id', $user_id)->orderBy('reservation_date', 'asc')->orderBy('reservation_time', 'asc')->get();
        $user_name = Auth::user()->name;
        $shops = Shop::all();
        $favorites = FavoriteShop::where('user_id', $user_id)->where('is_active', 1)->get();
        
        return view('my_page', compact('reservations', 'user_name', 'favorites'));
    }
}
