<?php

namespace App\Http\Controllers\Couple;

use App\Http\Controllers\Controller;
use App\Services\CoupleService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    private $service;
    public function __construct(CoupleService $coupleService)
    {
        $this->service = $coupleService;
    }

    public function __invoke(Request $request)
    {
        $couples = $this->service->getAllCouples($request);
        return DataTables::of($couples)
            ->addColumn('name', function ($couple) {
                return $couple->name;
            })
            ->addColumn('groom_name', function ($couple) {
                return $couple->groom_name;
            })
            ->addColumn('bride_name', function ($couple) {
                return $couple->bride_name;
            })
            ->addColumn('action', function($couple) {
                return view('pages.couple.action', compact('couple'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
