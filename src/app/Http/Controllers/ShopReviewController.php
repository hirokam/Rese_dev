<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ReviewShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopReviewController extends Controller
{
    public function review(Request $request)
    {
        $shop_data = Shop::find($request->shop_id);

        return view('shop_review', compact('shop_data'));
    }

    public function reviewCreate(Request $request)
    {
        $shop_review = ReviewShop::create([
            'user_id' => Auth::id(),
            'shop_id' => $request->shop_id,
            'stars' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect('/visited');
    }

    public function updateView($shop_id)
    {
        $old_shop_review = ReviewShop::where('user_id', Auth::id())->where('shop_id', $shop_id)->first();
        $stars = $old_shop_review->stars;

        return view('update_shop_review', compact('old_shop_review', 'stars'));
    }

    public function reviewUpdate(Request $request)
    {
        $shop_id = $request->shop_id;
        ReviewShop::where('user_id', Auth::id())->where('shop_id', $request->shop_id)->update([
            'stars' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('detail', ['shop_id' => $shop_id]);
    }
}
