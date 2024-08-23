<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public const MOMENT_TYPE = 'moment';

    public const GALLERY_TYPE = 'gallery';

    public const BANNER_TYPE = 'banner';

    protected $table = 'event_images';

    protected $guarded = [
        'id',
    ];

    public function medias()
    {
        return $this->morphToMany(Media::class, 'model');
    }
}
