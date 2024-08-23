<?php

namespace App\Http\Controllers\User;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required_with:confirmPassword', 'string', 'min:8', 'same:confirmPassword'],
            'confirmPassword' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(NotificationHelper::notifyErrorList($validator->errors()));
        }

        DB::beginTransaction();

        try {
            $this->service->createUser($request);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(NotificationHelper::notifyError($exception));
        }

        DB::commit();
        return redirect()
            ->route('pages.user.index')
            ->with(NotificationHelper::notifySuccess("User has been created"));
    }
}
