<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Event $event): View
    {
        return view('pages.event.edit', compact('event'));
    }
}
