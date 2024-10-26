<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $events = $this->repository->getEvents($request);

        return DataTables::of($events)
            ->addColumn('name', function ($event) {
                return $event->name;
            })
            ->addColumn('couple', function ($event) {
                return "{$event->couple->groom_name} & {$event->couple->bride_name}";
            })
            ->addColumn('action', function ($event) {
                return view('pages.event.action', compact('event'));
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
}
