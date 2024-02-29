<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\FavoriteShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $unique_areas = array_unique($shops->pluck('area')->toArray());
        $unique_genres = array_unique($shops->pluck('genre')->toArray());

        $user_id = Auth::id();
        $records_existence = FavoriteShop::where('user_id', $user_id)->get();

        foreach ($shops as $shop) {
            $record = $records_existence->where('shop_id', $shop->id)->first();
            $shop->is_favorite = $record ? $record->is_active : false;
        }

        return view('shop_all', compact('shops', 'unique_areas', 'unique_genres', 'records_existence'));
    }

    public function search(Request $request)
    {
        // $shops_query = Shop::query();

        // if ($input_area) {
        //     $shops_query->where('area', $input_area);
        // }

        // if ($input_genre) {
        //     $shops_query->where('genre', $input_genre);
        // }

        // $shops = $shops_query->get();
        $shops = Shop::where('area', $request->area)->Where('genre', $request->genre)->Where('shop_name', 'LIKE',"%{$request->text}%")->get();

        $user_id = Auth::id();
        $records_existence = FavoriteShop::where('user_id', $user_id)->get();

        foreach ($shops as $shop) {
            $record = $records_existence->where('shop_id', $shop->id)->first();
            $shop->is_favorite = $record ? $record->is_active : false;
        }

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
