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
        $path=config('path.picture_event');
        $file->move($path, $image);
        return $image;
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
    
    /**
     * [get Event Exist]
     *
     * @return [type] [list event]
     */
    public function getEventExist()
    {
        return $this->model
        ->where('end_time', '>=', date(config('date.date_system')))
        ->get();
    }
}
