<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Image;
use App\Models\Moment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class MomentController extends Controller
{
    private $type;

    public function __construct()
    {
        $this->type = Image::MOMENT_TYPE;
    }

    public function index()
    {
        return view('pages.moment.index');
    }

    public function datatables()
    {
        $moments = Moment::all();

        return DataTables::of($moments)
            ->addColumn('event', function ($moment) {
                return $moment->event->name;
            })
            ->addColumn('title', function ($moment) {
                return $moment->name;
            })
            ->addColumn('description', function ($moment) {
                return $moment->description;
            })
            ->addColumn('date', function ($moment) {
                return $moment->date;
            })
            ->addColumn('image', function ($moment) {
                return $moment->image;
            })
            ->addColumn('action', function ($moment) {
                return view('partials.moment-action', compact('moment'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $events = auth()->user()->events->pluck('name', 'uuid');

        return view('pages.moment.create', compact('events'));
    }

    public function edit(Moment $moment)
    {
        return view('pages.moment.edit', compact('moment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'event' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        $event = Event::findByUID($request->input('event'));

        DB::beginTransaction();
        try {
            $moment = Moment::create([
                'user_id' => $request->user()->id,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'event_id' => $event->id,
                'date' => date('Y-m-d H:i:s', strtotime($request->input('date'))),
            ]);

            if ($request->file('image')) {
                $this->imageSave($request, $moment);
            }
        } catch (\Exception $exec) {
            DB::rollBack();
            Log::error('Error on '.$exec->getFile().' at line '.$exec->getLine().' : '.$exec->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }

        DB::commit();

        return redirect()->route('moment.index')->with('success', 'Moment has been successfully created');
    }

    private function imageSave(Request $request, Moment $moment)
    {
        $file = $request->file('image');
        $target = config('settings.image.location').Image::MOMENT_TYPE;
        $filename = "image-{$this->type}-user-{$request->user()->id}-event-{$moment->event->id}-moment-{$moment->id}.{$file->getClientOriginalExtension()}";
        $file->move(
            directory: $target,
            name: $filename
        );

        $moment->update([
            'image' => $filename,
        ]);
    }
}
