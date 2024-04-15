<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\FavoriteShop;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

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

        return view('shop_all', compact('shops', 'areas', 'genres', 'records_existence'));
    }

    public function search(Request $request)
    {
        $area = Area::where('area', $request->area)->first();
        $genre = Genre::where('genre', $request->genre)->first();

        if($request->area) {
            if($request->genre) {
                if($request->text) {
                    $shops = Shop::where('area_id', $area->id)->where('genre_id', $genre->id)->where('shop_name', 'LIKE', "%{$request->text}%")->get();
                }elseif(empty($request->text)) {
                    $shops = Shop::where('area_id', $area->id)->Where('genre_id', $genre->id)->get();
                }
            }elseif(empty($request->genre)) {
                if($request->text) {
                    $shops = Shop::where('area_id', $area->id)->Where('shop_name', 'LIKE',"%{$request->text}%")->get();
                }elseif(empty($request->text)) {
                    $shops = Shop::where('area_id', $area->id)->get();
                }
            }
        }elseif(empty($request->area)) {
            if($request->genre) {
                if($request->text) {
                    $shops = Shop::where('genre_id', $genre->id)->Where('shop_name', 'LIKE',"%{$request->text}%")->get();
                }elseif(empty($request->text)) {
                    $shops = Shop::where('genre_id', $genre->id)->get();
                }
            }elseif(empty($request->genre)) {
                if($request->text) {
                    $shops = Shop::where('shop_name', 'LIKE', "%{$request->text}%")->get();
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
