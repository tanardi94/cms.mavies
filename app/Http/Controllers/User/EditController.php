<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $breadcrumbs = [
            [
                'url' => route('pages.user.index'),
                'title' => 'Manage Users',
            ],
            [
                'url' => route('pages.user.edit', $user->uuid),
                'title' => 'Edit User'
            ]
        ];

        return view('pages.user.edit', compact('user', 'breadcrumbs'));
    }
}
