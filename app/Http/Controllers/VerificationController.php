<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice()
    {
        return view('/login/verificationEmail');
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/login')->with('register', 'Email has been verification');
    }
    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        // return "Verification success dikirim";
        return redirect('/email/verify/need-verification')->with('verification', 'Email verification has been successful, please check your email');
    }
}