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
     * @param Event $event [define table Event]
     */
    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    /**
     * Get events newest
     *
     * @return array Events
     */
    public function getEventNewest()
    {
        return $this->model->latest()->take(config('constants.LIMIT_EVENT_INDEX'))->get();
    }
}
