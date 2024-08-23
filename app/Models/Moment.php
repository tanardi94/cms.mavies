<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moment extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function scopeFindByUID($query, $uuid)
    {
        return $query->where('uuid', $uuid)->first();
    }
}
