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
     * @param EventRepository         $eventRepository         [description]
     */
    public function __construct(RegisterEventRepository $joinEventRepository, EventRepository $eventRepository)
    {
        $this->registerEventRepository = $joinEventRepository;
        $this->eventRepository = $eventRepository;
    }

    /**
     * Running index page
     *
     * @param int $id [id of event]
     *
     * @return Reponse
     */
    public function join($id)
    {
        $event = $this->eventRepository->find($id);
        if (empty($event)) {
            Session::flash('msg', trans('event.event_not_found'));
            return redirect('/');
        }
        $this->joinEventRepository->join($id);
        Session::flash('msg', trans('event.register_event_successfully'));
        return redirect('/');
    }
}
