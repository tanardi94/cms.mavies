<?php
namespace App\Services;

use App\Models\Couple;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CoupleService
{
    public function getALlCouples(Request $request): Collection
    {
        return Couple::query()
            ->where('user_id', $request->user()->id)
            ->get();
    }

    public function createCouple(Request $request)
    {
        return $request->all();
    }
}