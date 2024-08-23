<?php

namespace App\Http\Controllers\User;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */

    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function __invoke(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['string'],
            'email' => ['string', 'email'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->with(NotificationHelper::notifyErrorList($validator->errors()));
        }

        DB::beginTransaction();
        try {
            $this->service->updateUser($request, $user);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(NotificationHelper::notifyError($exception));
        }

        DB::commit();
        return redirect()
            ->route('pages.user.index')
            ->with(NotificationHelper::notifySuccess("User has been updated"));
    }
}
