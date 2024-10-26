<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $couples = $request->user()->couples->pluck('couple_name', 'id');

        return view('pages.event.create', compact('couples'));
    }
}
