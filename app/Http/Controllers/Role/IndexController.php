<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
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
            ]
        ];

        return view('pages.role-permission.index', compact('breadcrumbs'));
    }
}
