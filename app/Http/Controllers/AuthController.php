<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;

class AuthController extends Controller
{
    /**
     * Show login form.
     *
     * @return \Illuminate\Http\Response
     */
    function login()
    {
        return view('login');
    }

    /**
     * Handle login process.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        session()->flash('warning', 'Invalid username and/or password!');

        return redirect()->back();
    }

    /**
     * Handle logout process.
     *
     * @return \Illuminate\Http\Response
     */
    function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
