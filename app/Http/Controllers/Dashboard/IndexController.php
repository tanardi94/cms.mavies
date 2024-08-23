<?php

namespace App\Http\Controllers\Dashboard;

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
                'url' => route('pages.dashboard.index'),
                'title' => 'Dashboard',
            ],
        ];

        return view('pages.dashboard.index', compact('breadcrumbs'));
    }
}
