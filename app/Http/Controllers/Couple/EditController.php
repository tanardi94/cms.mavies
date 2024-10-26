<?php

namespace App\Http\Controllers\Couple;

use App\Http\Controllers\Controller;
use App\Models\Couple;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Couple $couple)
    {
        $breadcrumbs = [
            [
                'url' => route('pages.couple.index'),
                'title' => 'Manage Couples',
            ],
            [
                'url' => route('pages.couple.edit', $couple->uuid),
                'title' => 'Edit Couple'
            ]
        ];

        return view('pages.couple.edit', compact('couple', 'breadcrumbs'));
    }
}
