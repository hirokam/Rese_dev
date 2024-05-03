<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
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

    public function reviewCreate(ReviewRequest $request)
    {
        if(!$request->upload_file) {
            $shop_review = ReviewShop::create([
                'user_id' => Auth::id(),
                'shop_id' => $request->shop_id,
                'stars' => $request->rating,
                'comment' => $request->comment,
            ]);
        } else {
            $dir = 'review';
            $file_name = $request->file('upload_file')->getClientOriginalName();
            $request->file('upload_file')->storeAs('public/' . $dir, $file_name);

            $shop_review = ReviewShop::create([
            'user_id' => Auth::id(),
            'shop_id' => $request->shop_id,
            'stars' => $request->rating,
            'comment' => $request->comment,
            'picture_name' => $file_name,
            'path' => 'storage/' . $dir . '/' . $file_name,
            ]);
        }

        return redirect()->route('detail', ['shop_id' => $request->shop_id]);
    }

    public function updateView($shop_id)
    {
        $old_shop_review = ReviewShop::where('user_id', Auth::id())->where('shop_id', $shop_id)->first();
        $stars = $old_shop_review->stars;

        return view('update_shop_review', compact('old_shop_review', 'stars'));
    }

    public function reviewUpdate(ReviewRequest $request)
    {
        $shop_id = $request->shop_id;

        if(!$request->upload_file) {
            ReviewShop::where('user_id', Auth::id())->where('shop_id', $request->shop_id)->update([
                'stars' => $request->rating,
                'comment' => $request->comment,
            ]);
        } else {
            $dir = 'review';
            $file_name = $request->file('upload_file')->getClientOriginalName();
            $request->file('upload_file')->storeAs('public/' . $dir, $file_name);

            ReviewShop::where('user_id', Auth::id())->where('shop_id', $request->shop_id)->update([
            'stars' => $request->rating,
            'comment' => $request->comment,
            'picture_name' => $file_name,
            'path' => 'storage/' . $dir . '/' . $file_name,
            ]);
        }

        return redirect()->route('detail', ['shop_id' => $shop_id]);
    }

    public function deleteView($shop_id)
    {
        $old_shop_review = ReviewShop::where('user_id', Auth::id())->where('shop_id', $shop_id)->first();
        $stars = $old_shop_review->stars;

        return view('delete_shop_review', compact('old_shop_review', 'stars'));
    }

    public function reviewDelete(Request $request)
    {
        $shop_id = $request->shop_id;
        ReviewShop::where('user_id', Auth::id())->where('shop_id', $request->shop_id)->delete();

        return redirect()->route('detail', ['shop_id' => $shop_id]);
    }

    public function allReviews($shop_id)
    {
        $shop = Shop::find($shop_id);
        $reviews = ReviewShop::where('shop_id', $shop->id)->get();
        $count_reviews = $reviews->count();
        $average_stars = ReviewShop::select('shop_id')->selectRaw('AVG(stars) as stars')->groupBy('shop_id')->get();

        return view('all_reviews', compact('shop', 'reviews'));
    }
}
