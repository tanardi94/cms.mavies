<?php

namespace App\Http\Controllers\Role;

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
                'url' => route('pages.role.index'),
                'title' => 'Manage Roles',
            ],
            [
                'url' => route('pages.role.create'),
                'title' => 'Create Role',
            ]
        ];

        return view('pages.role-permission.create', compact('breadcrumbs'));
    }
}
