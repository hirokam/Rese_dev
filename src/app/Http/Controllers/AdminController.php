<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminController extends Controller
{
    public function adminHome()
    {
        $random = Str::random(20);

        // if(!auth()->role()->admin()) {
        //     abort(403, 'Unauthorized action.');
        // }
        return view('admin_home', compact('random'));
    }

    public function adminRegister(Request $request)
    {
        DB::beginTransaction();

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if(Auth::user()->role === 'admin') {
                $user->role = 'store';
                $user->save();
            }

            DB::commit();

            return response()->json(['message' => 'ユーザーが作成されました'], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'エラーが発生しました'], 500);
        }
    }
}
