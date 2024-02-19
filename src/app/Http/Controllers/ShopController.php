<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop_all', compact('shops'));
    }

        public function shopDetail(Request $request, $shop_id)
    {
        $shop_detail = Shop::find($shop_id);
        return view('shop_detail', compact('shop_detail'));
    }
}
