<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopReview;
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
        $shop_review = ShopReview::create([
            'user_id' => Auth::id(),
            'shop_id' => $request->shop_id,
            'stars' => $request->stars,
            'comment' => $request->comment,
        ]);

        return redirect('/visited');
    }
}
