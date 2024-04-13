<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationEmailController extends Controller
{
    public function sendMail()
    {
        $users_email = User::pluck('email');
        foreach($users_email as $user_email) {
            Mail::to($user_email)->send(new NotificationEmail());
        }

        return redirect('/');
    }
}