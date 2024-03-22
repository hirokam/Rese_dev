<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        $reservation_info = Reservation::where('user_id', $request->user_id)->where('shop_id', $request->shop_id)->where('reservation_date', $request->reservation_date)->where('reservation_time', $request->reservation_time)->first();

        return view('qr_code', compact('reservation_info'));
    }
}
