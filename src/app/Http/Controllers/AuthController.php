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
        //1.全体の表示はできるが、エリア、ジャンルの検索をかけるとエラー。
        // if ($request->area) {
        //     $shops = Shop::where('area', $request->area);
        // }else{
        //     $shops = Shop::all();
        // }

        // if ($request->genre) {
        //     $shops = Shop::where('genre', $request->genre);
        // }else{
        //     $shops = Shop::all();
        // }

        //2.全網羅構文
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
        
        //3.エリア検索は格納されているが表示されない。ジャンル検索は可能。テキストではPODのシリアル化は許可されていないとエラー。
        // if($request->area)
        //     $shops = Shop::where('area', $request->area)->get();
        // ここでデバックしたら値はちゃんと格納されていたが表示されない。
        // dd($shops);
        // if($request->genre)
        //     $shops = Shop::where('genre', $request->genre)->get();
        // if($request->text)
        //     $shops = Shop::where('shop_name', 'LIKE',"%{$request->text}%");

        //4.エリア・ジャンルの検索およびエリア・ジャンル・テキストでの検索可。
        // $shops = Shop::where('area', $request->area)->Where('genre', $request->genre)->Where('shop_name', 'LIKE',"%{$request->text}%")->get();
        // dd($shops);
        
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
