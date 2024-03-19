<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function adminHome()
    {
        // if(!auth()->role()->admin()) {
        //     abort(403, 'Unauthorized action.');
        // }
        return view('layouts.base');
    }
}
