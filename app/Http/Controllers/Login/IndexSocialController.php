<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class IndexSocialController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $social)
    {
        return Socialite::driver($social)->redirect();
    }
}
