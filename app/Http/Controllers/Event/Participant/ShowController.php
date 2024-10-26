<?php

namespace App\Http\Controllers\Event\Participant;

use App\Http\Controllers\Event\BaseController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view('pages.event.participants');
    }
}
