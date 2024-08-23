<?php

namespace App\Http\Controllers\Couple;

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
                'url' => route('pages.couple.index'),
                'title' => 'Manage Couples',
            ],
            [
                'url' => route('pages.couple.create'),
                'title' => 'Create couple'
            ]
        ];

        return view('pages.couple.create', compact('breadcrumbs'));
    }
}
