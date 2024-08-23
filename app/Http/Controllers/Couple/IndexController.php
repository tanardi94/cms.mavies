<?php

namespace App\Http\Controllers\Couple;

use App\DataTables\CouplesDataTable;
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
                'url' => route('pages.couple.index'),
                'title' => 'Manage Couples',
            ]
        ];
        return view('pages.couple.index', compact('breadcrumbs'));
    }
}
