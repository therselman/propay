<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.index');
    }

    function login()
    {
        return view('admin.login');
    }
    function postLogin()
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('username', $request->username)->first();

        if (auth()->attempt($credentials)) {

            return redirect()->route('home');

        } else {
            session()->flash('message', 'Invalid username or password');
            return redirect()->back();
        }
    }
    function logout()
    {
        return view('admin.login');
    }

    function userForm()
    {
        return view('admin.login');
    }

    function createUser()
    {
        return view('admin.login');
    }
    function updateUser()
    {
        return view('admin.login');
    }
    function deleteUser()
    {
        return view('admin.login');
    }
}
