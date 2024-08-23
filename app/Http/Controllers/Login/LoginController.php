<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('pages.dashboard.index');
        } else {
            // $this->incrementLoginAttempts($request);

            return redirect()
                ->back()
                ->with("danger", "Incorrect user login details!");
        }
    }
}
