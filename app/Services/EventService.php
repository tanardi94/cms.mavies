<?php
namespace App\Services;

use App\Models\Event;

class EventService
{
    public function getCreatedEvents()
    {
        return Event::query()
            ->select('couple_id', 'name', 'tag', 'template', 'address', 'starts_at', 'ends_at')
            ->get();
    }

    public function getSpecificEventByUID()
    {

    }
}