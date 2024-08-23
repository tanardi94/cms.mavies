<?php

namespace App\Http\Controllers\Billing;

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
                'url' => route('pages.billing.index'),
                'title' => 'Billing',
            ]
        ];

        return view('pages.billing.index', compact('breadcrumbs'));
    }
}
