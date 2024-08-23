<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = [
            'breadcrumbs' => [
                [
                    'url' => route('pages.category.index'),
                    'title' => 'Manage Categories',
                ],
            ],
        ];

        return view('pages.category.index', $data);
    }
}
