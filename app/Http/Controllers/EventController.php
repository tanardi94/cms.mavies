<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    public function index(): View
    {
        return view('pages.event.index');
    }

    public function datatables()
    {
        $user = auth()->user();
        $couples = $user->couples->pluck('id');
        $events = Event::query()
            ->whereIn('couple_id', $couples)
            ->get();

        return DataTables::of($events)
            ->addColumn('name', function ($event) {
                return $event->name;
            })
            ->addColumn('couple', function ($event) {
                return "{$event->couple->groom_name} & {$event->couple->bride_name}";
            })
            ->addColumn('action', function ($event) {
                return view('partials.event-action', compact('event'));
            })
            ->addColumn('tag', function ($event) {
                return "#{$event->tag}";
            })
            ->addColumn('address', function ($event) {
                return $event->address;
            })
            ->addColumn('eventDate', function ($event) {
                return date('d F Y', strtotime($event->starts_at));
            })
            ->addColumn('eventSchedule', function ($event) {
                return date('H:i', strtotime($event->starts_at)).' - '.date('H:i', strtotime($event->ends_at));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $couples = auth()->user()->couples->pluck('couple_name', 'id');

        return view('pages.event.create', compact('couples'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'name' => ['required', 'string'],
            'tag' => ['required', 'string'],
            'couple' => ['required', 'integer'],
            'dates' => ['required', 'date'],
            'timeStart' => ['required', 'date_format:"H:i"'],
            'timeEnd' => ['required', 'date_format:"H:i"'],
        ]);

        DB::beginTransaction();

        try {
            Event::create([
                'user_id' => $user->id,
                'name' => $request->input('name'),
                'tag' => $request->input('tag'),
                'couple_id' => $request->input('couple'),
                'address' => $request->input('address'),
                'template' => $request->input('template') + 1,
                'starts_at' => date('Y-m-d H:i:s', strtotime("{$request->input('dates')}T{$request->input('timeStart')}")),
                'ends_at' => date('Y-m-d H:i:s', strtotime("{$request->input('dates')}T{$request->input('timeEnd')}")),
            ]);
        } catch (\Exception $exec) {
            DB::rollBack();
            Log::error('Error on '.$exec->getFile().' at line '.$exec->getLine().' : '.$exec->getMessage());

            return redirect()->back()->withInput()->withErrors('Something went wrong');
        }

        DB::commit();

        return redirect()->route('event.index')->with('success', 'Event has been created!');
    }

    public function edit()
    {
        return view('pages.event.edit');
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => ['string'],
            'tag' => ['string'],
            'couple' => ['integer'],
            'dates' => ['date'],
            'address' => ['string'],
            'timeStart' => ['date_format:"H:i"'],
            'timeEnd' => ['date_format:"H:i"'],
        ]);

        DB::beginTransaction();

        try {
            $event->update([
                'name' => $request->input('name'),
                'tag' => $request->input('tag'),
                'starts_at' => date('Y-m-d H:i:s', strtotime("{$request->input('dates')}T{$request->input('timeStart')}")),
                'ends_at' => date('Y-m-d H:i:s', strtotime("{$request->input('dates')}T{$request->input('timeEnd')}")),
                'address' => $request->input('address'),
            ]);
        } catch (\Exception $exec) {
            DB::rollBack();
            Log::error('Error on '.$exec->getFile().' at line '.$exec->getLine().' : '.$exec->getMessage());

            return redirect()->back()->withInput()->withErrors('Something went wrong');
        }

        DB::commit();

        return redirect()->route('event.index')->with('success', 'Event has been successfully updated');
    }

    public function attending(?string $eventID = null, ?string $participantID = null)
    {
        DB::beginTransaction();

        try {
            $event = Event::findByUID($eventID);
            $participant = Participant::findByUID($participantID);

            Attendance::where([
                'participant_id' => $participant->id,
                'event_id' => $event->id,
            ])->update([
                'is_attending' => Attendance::IS_ATTENDING,
            ]);
        } catch (\Exception $exec) {
            DB::rollBack();
            Log::error('Error on '.$exec->getFile().' at line '.$exec->getLine().' : '.$exec->getMessage());

            return redirect()->back()->withInput()->withErrors('Something went wrong');
        }

        DB::commit();
    }
}
