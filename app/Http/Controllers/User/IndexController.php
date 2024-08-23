<?php

namespace App\Http\Controllers\User;

use App\DataTables\UsersDataTable;
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
                'url' => route('pages.user.index'),
                'title' => 'Manage Users',
            ]
        ];
        return view('pages.user.index', compact('breadcrumbs'));
    }
}
