<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Couple extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function event()
    {
        return $this->hasOne(Event::class, 'couple_id');
    }

    public function getCoupleNameAttribute()
    {
        return $this->groom_name.' & '.$this->bride_name;
    }
}
