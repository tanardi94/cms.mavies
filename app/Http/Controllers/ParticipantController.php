<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Yajra\DataTables\DataTables;

class ParticipantController extends Controller
{
    public function index(Event $event)
    {
        $participants = $event->participants;

        return view('pages.participant.index', compact('event', 'participants'));
    }

    public function datatables(Event $event)
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
