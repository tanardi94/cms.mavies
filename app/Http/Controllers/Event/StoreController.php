<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'tag' => ['required', 'string'],
            'couple' => ['required', 'integer'],
            'dates' => ['required', 'date'],
            'timeStart' => ['required', 'date_format:"H:i"'],
            'timeEnd' => ['required', 'date_format:"H:i"'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        DB::beginTransaction();

        try {
            $this->repository->createEvent($request);
        } catch (\Throwable $th) {
            DB::rollBack();
            logger()->error("Error on {$th->getFile()}at line {$th->getLine()}: {$th->getMessage()}");

            return redirect()->route('event.create')->with('errors', 'Something was wrong!');
        }

        DB::commit();

        return redirect()->route('event.index')->with('success', 'Event berhasil dibuat');
    }
}
