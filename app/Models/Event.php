<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function couple()
    {
        return $this->belongsTo(Couple::class, 'couple_id');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'attendances');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'event_id');
    }

    public function scopeFindByUID($query, $id)
    {
        return $query->where('uuid', $id)->first();
    }
}
