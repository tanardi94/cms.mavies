<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ImageController extends Controller
{
    private $type;

    public function __construct()
    {
        $this->type = [
            1 => Image::GALLERY_TYPE,
            2 => Image::BANNER_TYPE,
        ];
    }

    public function index(): View
    {
        return view('pages.image.index');
    }

    public function datatables()
    {
        $events = auth()->user()->couples()->with('event')->get()->pluck('event')->flatten();

        return DataTables::of($events)
            ->addColumn('images', function ($event) {
                return view('partials.images-list', $event->images);
            })
            ->addColumn('action', function ($image) {
                return view('partials.image-action', $image);
            })
            ->rawColumns(['images', 'action'])
            ->make();
    }

    public function create(): View
    {
        $events = auth()->user()->events->pluck('name', 'uuid');
        $types = [
            1 => 'Gallery',
            2 => 'Banner',
        ];

        return view('pages.image.create', compact('events', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event' => ['required', 'string'],
            'type' => ['required', 'integer'],
        ]);
        DB::beginTransaction();

        try {
            $event = Event::findByUID($request->input('event'));

            foreach ($request->input('images', []) as $file) {
                $type = $request->input('type');
                Image::create([
                    'value' => $file,
                    'type' => $type,
                    'event_id' => $event->id,
                    'user_id' => $request->user()->id,
                ]);
                // $file = $request->file('file');

                // $this->imageUpload($file, $type, $request->user(), $event);
            }
        } catch (\Exception $exec) {
            DB::rollBack();
            Log::error('Error on '.$exec->getFile().' at line '.$exec->getLine().' : '.$exec->getMessage());

            return redirect()->back()->withInput()->withErrors('Something went wrong');
        }

        DB::commit();

        return redirect()->route('event-image.index')->with('success', 'Image has been uploaded');
    }

    public function storeMedia(Request $request)
    {
        $path = config('settings.image.location').'/gallery';

        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid().'_'.trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
