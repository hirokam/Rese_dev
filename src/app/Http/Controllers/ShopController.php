<?php

namespace App\Http\Controllers;

use App\Models\FavoriteShop;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = Shop::all();
        $unique_areas = array_unique($shops->pluck('area')->toArray());
        $unique_genres = array_unique($shops->pluck('genre')->toArray());

        $user_id = Auth::id();
        $records_existence = FavoriteShop::where('user_id', $user_id)->get();

        $search_results = $request->session()->get('search_results');
        if(!empty($search_results)) {
            $shops = $search_results;
        }

        foreach ($shops as $shop) {
            $record = $records_existence->where('shop_id', $shop->id)->first();
            $shop->is_favorite = $record ? $record->is_active : false;
        }

        return view('shop_all', compact('shops', 'unique_areas', 'unique_genres', 'records_existence'));
    }

    public function search(Request $request)
    {
        if($request->area) {
            if($request->genre) {
                if($request->text) {
                    $shops = Shop::where('area', $request->area)->Where('genre', $request->genre)->Where('shop_name', 'LIKE',"%{$request->text}%")->get();
                }elseif(empty($request->text)) {
                    $shops = Shop::where('area', $request->area)->Where('genre', $request->genre)->get();
                }
            }elseif(empty($request->genre)) {
                if($request->text) {
                    $shops = Shop::where('area', $request->area)->Where('shop_name', 'LIKE',"%{$request->text}%")->get();
                }elseif(empty($request->text)) {
                    $shops = Shop::where('area', $request->area)->get();
                }
            }
        }elseif(empty($request->area)) {
            if($request->genre) {
                if($request->text) {
                    $shops = Shop::where('genre', $request->genre)->Where('shop_name', 'LIKE',"%{$request->text}%")->get();
                }elseif(empty($request->text)) {
                    $shops = Shop::where('genre', $request->genre)->get();
                }
            }elseif(empty($request->genre)) {
                if($request->text) {
                    $shops = Shop::Where('shop_name', 'LIKE',"%{$request->text}%")->get();
                }elseif(empty($request->text)) {
                    $shops = Shop::all();
                }
            }
        };

        $user_id = Auth::id();
        $records_existence = FavoriteShop::where('user_id', $user_id)->get();
        foreach ($shops as $shop) {
            $record = $records_existence->where('shop_id', $shop->id)->first();
            $shop->is_favorite = $record ? $record->is_active : false;
        }

        $request->session()->put('search_results', $shops);
        return redirect('/');
    }
}
