<?php

namespace App\Http\Controllers;

use App\Models\Shop;
// use App\Models\FavoriteShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $unique_areas = array_unique($shops->pluck('area')->toArray());
        $unique_genres = array_unique($shops->pluck('genre')->toArray());
        // $favorite_existence = FavoriteShop::all();

        return view('shop_all', compact('shops', 'unique_areas', 'unique_genres'));
        // return view('shop_all', compact('shops', 'favorite_existence'));
    }

    public function search(Request $request)
    {
        $input_area = $request->input('area');
        $input_genre = $request->input('genre');
        $input_text = $request->input('text');
        // $shops = Shop::where('area', $input_area)->Where('genre', $input_genre)->Where('shop_name', 'LIKE',"%{$input_text}%")->get();
        // $shops = Shop::where('area', $input_area)->Where('genre', $input_genre)->get();
        // $shop_name =Shop::where('shop_name', 'LIKE', "%{$input_text}%");
        $request->session()->put('search_results', $shops);

        return redirect('/');
    }

    public function menu()
    {
        return view('menu');
    }

    public function logout()
    {
        return view('auth.login');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function done()
    {
        return view('done');
    }
}
