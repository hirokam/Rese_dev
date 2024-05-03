<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\FavoriteShop;
use App\Models\ReviewShop;
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

        $average_stars = ReviewShop::select('shop_id')->selectRaw('AVG(stars) as stars')->groupBy('shop_id')->pluck('stars', 'shop_id');
        $count_reviews = ReviewShop::select('shop_id')->selectRaw('COUNT(id) as shop_review')->groupBy('shop_id')->pluck('shop_review', 'shop_id');

        $user_id = Auth::id();
        $records_existence = FavoriteShop::where('user_id', $user_id)->get();

        $search_results = $request->session()->get('search_results');
        if(!empty($search_results)) {
            $shops = $search_results;
        }

        foreach ($shops as $shop) {
            $shop->count_reviews = $count_reviews[$shop->id] ?? 0;
            $shop->average_stars = $average_stars[$shop->id] ?? 0;
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

    public function sort(Request $request)
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $average_stars = ReviewShop::select('shop_id')->selectRaw('AVG(stars) as stars')->groupBy('shop_id')->pluck('stars', 'shop_id');
        $count_reviews = ReviewShop::select('shop_id')->selectRaw('COUNT(id) as shop_review')->groupBy('shop_id')->pluck('shop_review', 'shop_id');

        $user_id = Auth::id();
        $records_existence = FavoriteShop::where('user_id', $user_id)->get();

        $search_results = $request->session()->get('search_results');
        if(!empty($search_results)) {
            $shops = $search_results;
        }

        foreach ($shops as $shop) {
            $shop->count_reviews = $count_reviews[$shop->id] ?? 0;
            $shop->average_stars = $average_stars[$shop->id] ?? 0;
            $record = $records_existence->where('shop_id', $shop->id)->first();
            $shop->is_favorite = $record ? $record->is_active : false;
        }

        $sortBy = $request->get('sort_by');
        switch ($sortBy) {
            case 'high_rating':
                $shops = $shops->sortByDesc('average_stars');
                break;
            case 'low_rating':
                $shops = $shops->sortBy(function($shop) {
                    return $shop->average_stars == 0 ? PHP_INT_MAX : $shop->average_stars;
                });
                // $shops = $shops->sortBy('average_stars');
                // 評価が低い順に並び替える
                // $shops = $shops->sort(function($a, $b) {
                    // 評価がない店舗（星が0）を最後尾に移動するためのロジック
                    // if ($a->average_stars == 0 && $b->average_stars != 0) {
                        // return 1; // $aが評価がない場合、$bを先に表示
                    // } elseif ($a->average_stars != 0 && $b->average_stars == 0) {
                        // return -1; // $bが評価がない場合、$aを先に表示
                    // } else {
                        // 評価がある場合は評価の低い順に並び替え
                        // return $a->average_stars - $b->average_stars;
                    // }
                // });
                break;
            case 'random':
                $shops = $shops->shuffle();
                break;
        }
        // dd($shops);

        return view('shop_all', compact('shops', 'areas', 'genres', 'records_existence'));
    }
}
