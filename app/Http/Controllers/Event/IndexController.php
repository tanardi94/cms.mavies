<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $breadcrumbs = [
            'urls' => [
                [
                    'url' => route('pages.event.index'),
                    'title' => 'Manage Events',
                ],
            ],
            'table_title' => 'Manage Events',
        ];
        return view('pages.event.index', compact('breadcrumbs'));
    }
}
