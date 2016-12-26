<?php

namespace App\Repositories\Event;

use App\Repositories\BaseRepository;
use App\Repositories\Event\EventRepositoryInterface;
use App\Models\Event;
use Carbon\Carbon;
use DB;

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
    * Method get all event by userId
    *
    * @param integer $id id User
    *
    * @return list event
    */
    public function getById($id)
    {
        return $this->model
        ->join('user', 'user.id', '=', 'events.user_id')
        ->where('user_id', $id)
        ->select('*', 'events.id')->get();
    }

    /**
    * Method save  file into folder
    *
    * @param file $file file get from form.
    *
    * @return picture name to save into database
    */
    public function saveFile($file)
    {
        $now = Carbon::now();
        $image = $now->toDateTimeString().$file->getClientOriginalName();
        $path=config('path.image_event');
        $file->move($path, $image);
        return $image;
    }
}
