<?php

namespace App\Http\Controllers\Event\Participant;

use App\Http\Controllers\Event\BaseController;
use App\Models\Event;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Event $event)
    {
        $participants = $event->participants;

        return DataTables::of($participants)
            ->addColumn('name', function ($participant) {
                return $participant->name;
            })
            ->addColumn('type', function ($participant) {

                return $participant->type;
            })
            ->addColumn('action', function ($participant) {
                return view('partials.participant-action', compact('participant'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
