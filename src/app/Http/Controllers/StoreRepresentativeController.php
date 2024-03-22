<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\User;

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
        $reservations = Reservation::all();
        $user_id = Auth::id();
        $shops = Shop::where('user_id', $user_id)->get();
        // foreach($shops as $shop) {
        //     $shop->reservations = $shop->reservations()->get();
        // }
        //     $reservations = Reservation::where('shop_id', $shop->id)->get();
        // }
        // foreach($reservations as $reservation) {
        //     $users = User::where('id', $reservation->user_id)->get();
        // }

        return view('reservation_check', compact('shops', 'reservations'));
    }
}
