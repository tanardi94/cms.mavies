<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $breadcrumbs = [
            [
                'url' => route('pages.auth.profile'),
                'title' => 'User Profile',
            ]
        ];
        return view('pages.auth.profile', compact('breadcrumbs'));
    }
}
