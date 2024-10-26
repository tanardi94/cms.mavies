<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;

class BaseController extends Controller
{
    protected $repository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->repository = $eventRepository;
    }
}
