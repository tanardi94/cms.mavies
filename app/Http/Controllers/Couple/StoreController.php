<?php

namespace App\Http\Controllers\Couple;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Services\CoupleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'groom_name' => ['required', 'string'],
            'bride_name' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(NotificationHelper::notifyErrorList($validator->errors()));
        }

        DB::beginTransaction();

        try {
            $this->service->createCouple($request);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(NotificationHelper::notifyError($exception));
        }

        DB::commit();
        return redirect()
            ->route('pages.Couple.index')
            ->with(NotificationHelper::notifySuccess("Couple has been created"));
    }
}
