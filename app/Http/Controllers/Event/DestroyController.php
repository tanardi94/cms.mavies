<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Event $event)
    {
        DB::beginTransaction();
        try {
            $event->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            logger()->error("Error when deleting event: {$th->getMessage()}");

            return redirect()->back()->withErrors('Error deleting event');
        }

        DB::commit();

        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus');
    }
}
