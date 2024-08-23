<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class CoupleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.couple.index');
    }

    public function coupleDatatables()
    {
        $couples = Couple::all();

        return DataTables::of($couples)
            ->addColumn('groom_name', function ($couple) {
                return $couple->groom_name;
            })
            ->addColumn('bride_name', function ($couple) {
                return $couple->bride_name;
            })
            ->addColumn('phone', function ($couple) {
                return $couple->phone;
            })
            ->addColumn('action', function ($couple) {
                return view('partials.couple-action', compact('couple'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.couple.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'groom_name' => ['required', 'string'],
            'bride_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
        ]);

        DB::beginTransaction();

        try {
            Couple::create([
                'groom_name' => $request->input('groom_name'),
                'bride_name' => $request->input('bride_name'),
                'phone' => $request->input('phone'),
                'user_id' => $request->user()->id,
                'email' => $request->input('email'),
            ]);
        } catch (\Exception $exec) {
            DB::rollBack();
            Log::error('Error on '.$exec->getFile().' at line '.$exec->getLine().' : '.$exec->getMessage());
        }
        DB::commit();

        // return response()->json($request->all());

        return redirect()->route('couple.index')->with('success', 'Couple is successfully registered!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Couple $couple)
    {
        return view('pages.couple.edit', compact('couple'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Couple $couple)
    {
        $couple->delete();
    }
}
