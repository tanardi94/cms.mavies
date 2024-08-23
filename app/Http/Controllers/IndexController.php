<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function home()
    {
        if (Auth::user()) {
            return view('dashboard');
        }

        return redirect()->route('login');
    }
}
