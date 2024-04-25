<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreRepresentativeController extends Controller
{
    public function register(Request $request)
    {
        $dir = 'image';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $user_id = Auth::id();
        $input = Shop::create([
            'user_id' => $user_id,
            'shop_name' => $request->shop_name,
            'area_id' => $request->area,
            'genre_id' => $request->genre,
            'overview' => $request->overview,
            'file_name' => $file_name,
            'file_path' => 'storage/' . $dir . '/' . $file_name,
        ]);

        return redirect('/');
    }

    public function reservationCheck()
    {
        $user_id = Auth::id();
        $shop = Shop::where('user_id', $user_id)->first();
        $shop_name = $shop->shop_name;
        $reservations = Reservation::where('shop_id', $shop->id)->orderBy('reservation_date', 'asc')->paginate(10);

        return view('reservation_check', compact('shop_name', 'reservations'));
    }
}
