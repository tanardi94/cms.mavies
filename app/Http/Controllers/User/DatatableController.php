<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DatatableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    private $service;
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function __invoke(Request $request)
    {
        $users = $this->service->getAllUser();
        return DataTables::of($users)
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('email', function ($user) {
                return $user->email;
            })
            ->addColumn('created_at', function ($user) {
                return date('d F Y', strtotime($user->created_at));
            })
            ->addColumn('action', function($user) {
                return view('pages.user.action', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
