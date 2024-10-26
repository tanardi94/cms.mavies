<?php

namespace App\Http\Controllers\Couple;

use App\DataTables\CouplesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $breadcrumbs = [
            'table_title' => 'Manage Couples',
            'urls' => [
                [
                    'url' => route('pages.couple.index'),
                    'title' => 'Manage Couples',
                ],
            ],
        ];
        return view('pages.couple.index', compact('breadcrumbs'));
    }
}
