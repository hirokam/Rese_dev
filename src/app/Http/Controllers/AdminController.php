<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\ReviewShop;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminRegister(Request $request)
    {
        DB::beginTransaction();

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = now();
            $user->save();

            if(Auth::user()->role->role === 'admin') {
                $user->role_id = '2';
                $user->save();
            }

            DB::commit();

            return view('success');
        } catch (\Exception $e) {
            DB::rollBack();

            return view('failure');
        }
    }

    public function indexAdmin(Request $request)
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $average_stars = ReviewShop::select('shop_id')->selectRaw('AVG(stars) as stars')->groupBy('shop_id')->pluck('stars', 'shop_id');
        $count_reviews = ReviewShop::select('shop_id')->selectRaw('COUNT(id) as shop_review')->groupBy('shop_id')->pluck('shop_review', 'shop_id');

        $search_results = $request->session()->get('search_results');
        if(!empty($search_results)) {
            $shops = $search_results;
        }

        foreach ($shops as $shop) {
            $shop->count_reviews = $count_reviews[$shop->id] ?? 0;
            $shop->average_stars = $average_stars[$shop->id] ?? 0;
        }

        return view('shop_all_admin', compact('shops', 'areas', 'genres'));
    }

    public function searchAdmin(Request $request)
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

        $request->session()->put('search_results', $shops);
        return redirect('/admin/shop_all');
    }

    public function sortAdmin(Request $request)
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        $average_stars = ReviewShop::select('shop_id')->selectRaw('AVG(stars) as stars')->groupBy('shop_id')->pluck('stars', 'shop_id');
        $count_reviews = ReviewShop::select('shop_id')->selectRaw('COUNT(id) as shop_review')->groupBy('shop_id')->pluck('shop_review', 'shop_id');

        $search_results = $request->session()->get('search_results');
        if(!empty($search_results)) {
            $shops = $search_results;
        }

        foreach ($shops as $shop) {
            $shop->count_reviews = $count_reviews[$shop->id] ?? 0;
            $shop->average_stars = $average_stars[$shop->id] ?? 0;
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
                break;
        }
        // dd($sortBy);

        return view('shop_all_admin', compact('shops', 'areas', 'genres'));
    }

    public function deleteAdmin(Request $request)
    {
        $delete_review = ReviewShop::find($request->id)->delete();


        return back();
    }
}
