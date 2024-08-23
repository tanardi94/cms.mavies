<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $breadcrumbs = [
            [
                'url' => route('pages.user.index'),
                'title' => 'Manage Users',
            ],
            [
                'url' => route('pages.user.create'),
                'title' => 'Create User'
            ]
        ];

        return view('pages.user.create', compact('breadcrumbs'));
    }
}
