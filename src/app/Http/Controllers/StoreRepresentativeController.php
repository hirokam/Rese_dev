<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class StoreRepresentativeController extends Controller
{
    public function storeRepresentativeHome()
    {
        return view('store_representative_home');
    }

    public function storeRepresentativeRegister(Request $request)
    {
        $input = Shop::create([
            'shop_name' => $request->shop_name,
            'area' => $request->area,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'picture_url' => $request->picture_url,
        ]);

        return view('store_representative_home');
    }
}
