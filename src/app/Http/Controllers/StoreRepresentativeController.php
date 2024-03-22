<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreRepresentativeController extends Controller
{
    public function home()
    {
        return view('store_representative_home');
    }

    public function register(Request $request)
    {
        $user_id = Auth::id();
        $input = Shop::create([
            'user_id' => $user_id,
            'shop_name' => $request->shop_name,
            'area' => $request->area,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'picture_url' => $request->picture_url,
        ]);

        return view('store_representative_home');
    }

    public function reservationCheck()
    {
        $user_id = Auth::id();
        $shops = Shop::where('user_id', $user_id)->with('reservations')->get();

        return view('reservation_check', compact('shops'));
    }
}
