<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

            if(Auth::user()->role === 'admin') {
                $user->role = 'store';
                $user->save();
            }

            DB::commit();

            return view('success');
        } catch (\Exception $e) {
            DB::rollBack();

            return view('failure');
        }
    }
}
