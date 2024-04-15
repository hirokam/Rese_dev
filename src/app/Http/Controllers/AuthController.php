<?php

namespace App\Http\Controllers;

use App\Models\FavoriteShop;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function myPage()
    {
        $user_id = Auth::id();
        $current_date_time = Carbon::now();
        $reservations = Reservation::where('user_id', $user_id)->where('reservation_date', '>=', $current_date_time->toDateString())->orWhere(function($query) use ($current_date_time) {
            $query->where('reservation_date', $current_date_time->toDateString())->where('reservation_time', '>=', $current_date_time->toDateString());
        })->orderBy('reservation_date', 'asc')->orderBy('reservation_time', 'asc')->get();
        $user_name = Auth::user()->name;
        $favorites = FavoriteShop::where('user_id', $user_id)->where('is_active', 1)->get();

        return view('my_page', compact('reservations', 'user_name', 'favorites'));
    }

    public function visitedShop()
    {
        $user_id = Auth::id();
        $current_date_time = Carbon::now();
        $visited_shops = Reservation::where('user_id', $user_id)->where('reservation_date', '<', $current_date_time->toDateString())->get();

        return view('visited_shops', compact('visited_shops'));
    }

    public function menu()
    {
        return view('menu');
    }

}
