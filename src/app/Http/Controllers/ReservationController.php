<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
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
