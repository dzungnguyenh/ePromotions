<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\RegisterEvent\RegisterEventRepository;
use App\Repositories\Event\EventRepository;

class RegisterEventController extends Controller
{

    /**
     * The RegisterEventRepository instance
     *
     * @param RegisterEventRepository
     */
    protected $joinEventRepository;

    /**
     * The EventRepository instance
     *
     * @param EventRepository
     */
    protected $eventRepository;

    /**
     * Create a new controller instance.
     *
     * @param RegisterEventRepository $joinEventRepository [description]
     * @param EventRepository         $eventRepository     [description]
     */
    public function __construct(RegisterEventRepository $joinEventRepository, EventRepository $eventRepository)
    {
        $this->joinEventRepository = $joinEventRepository;
        $this->eventRepository = $eventRepository;
    }

    /**
     * Running index page
     *
     * @param int $eventId [id of event]
     *
     * @return Reponse
     */
    public function join($eventId)
    {
        $event = $this->eventRepository->find($eventId);
        if (empty($event)) {
            Session::flash('msg', trans('event.event_not_found'));
            return redirect('/');
        }
        $checkJoin = $this->joinEventRepository->checkJoin($eventId);
        if (!empty($checkJoin)) {
            Session::flash('msg', trans('event.has_been_register'));
            return redirect('/');
        } else {
            $this->joinEventRepository->join($eventId);
            Session::flash('msg', trans('event.register_event_successfully'));
            return redirect('/');
        }
    }

    /**
     * Get list history join event
     *
     * @return Response
     */
    public function getJoinEvent()
    {
        $sort = config('constants.NO');
        $historyJoins = $this->joinEventRepository->getJoinEvent();
        return view('user.history.historyEvent', compact('historyJoins', 'sort'));
    }
}
