<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop_all', compact('shops'));
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

    public function myPage()
    {
        return view('my_page');
    }
}
