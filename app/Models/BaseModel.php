<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Str::uuid();
            $query->view_id = Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function scopeFindByUID($query, $id)
    {
        return $query->where('uuid', $id)->first();
    }
}
