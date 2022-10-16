<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        if (Auth::guard('member')->check()) {
            return redirect()->route('dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return view('auth.login');
    }
}
