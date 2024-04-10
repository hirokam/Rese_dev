<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreRepresentativeController extends Controller
{
    public function storeRepresentativeHome()
    {
        $areas = Area::all();
        $genres = Genre::all();

        return view('store_representative_home', compact('areas', 'genres'));
    }

    public function confirm(Request $request)
    {
        $shop_info = $request->all();
        unset($shop_info['_token']);
        $area = Area::find($request->area);
        $genre = Genre::find($request->genre);

        return redirect('/');
    }

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
        $shops = Shop::where('user_id', $user_id)->with('reservations')->get();

        return view('reservation_check', compact('shops'));
    }
}
