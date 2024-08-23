<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $social)
    {
        return response()->json(
            Socialite::driver('google')->user()
        );
    }
}
