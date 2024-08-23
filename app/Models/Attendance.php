<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public const IS_ATTENDING = 1;

    public const IS_NOT_ATTENDING = 0;
}
