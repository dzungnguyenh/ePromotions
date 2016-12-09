<?php

namespace App\Repositories\Event;

use App\Repositories\BaseRepository;
use App\Repositories\Event\EventRepositoryInterface;
use App\Models\Event;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    /**
     *__construct function
     *
     * @param Event $event [description]
     */
    public function __construct(Event $event)
    {
        $this->model = $event;
    }
}
