<?php

namespace App\Http\Controllers;

use App\Helpers\AlertFormatter;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $remember = false;
        if($request->input('remember'))
        {
            $remember = true;
        }

        if(\Auth::attempt($credentials, $remember))
        {
            return redirect()->intended('/');
        }
        return redirect()->back()->with(AlertFormatter::danger('Username atau password salah.'));
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
