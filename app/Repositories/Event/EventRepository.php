<?php

namespace App\Repositories\Event;

use App\Repositories\BaseRepository;
use App\Repositories\Event\EventRepositoryInterface;
use App\Models\Event;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    /**
     *Construct function
     *
     * @param Event $Event [description]
     */
    public function __construct(Event $Event)
    {
        $this->model = $Event;
    }
}
