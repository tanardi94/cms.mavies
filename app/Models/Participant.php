<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function scopeFindByUID($query, $id)
    {
        return $query->where('uuid', $id)->first();
    }
}
