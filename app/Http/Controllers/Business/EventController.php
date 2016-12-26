<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\Event\EventRepository;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\EditEventRequest;
use App\User;
use Auth;
use DB;

class EventController extends Controller
{
    protected $eventRepository;
    /**
     * [__construct description]
     *
     * @param EventRepository $eventRepository [description]
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
    
    /**
     *Running index page
     *
     * @return function [Return list event]
     */
    public function index()
    {
         $event = $this->eventRepository->getById(Auth::User()->id);
         return view('event.index', ['event'=>$event]);
    }
    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }
    /**
     *Save event
     *
     * @param CreateEventRequest $request [Get request from form create]
     *
     * @return [index page]
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['image']=$this->eventRepository->saveFile($input['image']);
        $this->eventRepository->create($input);
        return redirect()->route('event.index');
    }
    /**
     * Display the detail event.
     *
     * @param int $id [value specify place of model]
     *
     * @return Event detail page
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);
        return view('event.show', compact('event'));
    }
    /**
     * Show the form for editing event.
     *
     * @param int $id [value specify place edit of mode]
     *
     * @return Edit page
     */
    public function edit($id)
    {
        $event = $this->eventRepository->find($id);
        return view('event.edit', compact('event'));
    }
    /**
     * Update the event.
     *
     * @param \Illuminate\Http\Request $request [Get value Request]
     * @param int                      $id      [Get place of edit page]
     *
     * @return Event page with update event detail.
     */
    public function update(EditEventRequest $request, $id)
    {
        $event=$this->eventRepository->find($id);
        if (empty($event)) {
            Session::flash('msg', trans('event.update_event_error'));
            return redirect()->route('event.index');
        }
        $input = $request->only('title', 'description', 'start_time', 'end_time', 'place');
        if ($request->hasFile('image')) {
            $input['image']=$this->eventRepository->saveFile($request->file('image'));
        }
        $this->eventRepository->update($input, $id);
        Session::flash('msg', trans('event.update_event_successfully'));
        return redirect()->route('event.index');
    }
    /**
     * Remove event.
     *
     * @param int $id [Get place delete]
     *
     * @return Event page with delete event detail.
     */
    public function destroy($id)
    {
        $event=$this->eventRepository->find($id);
        if (empty($event)) {
            Session::flash('msg', trans('event.delete_event_error'));
            return redirect()->route('event.index');
        }
        $this->eventRepository->delete($id);
        Session::flash('msg', trans('event.delete_event_successful'));
        return redirect()->route('event.index');
    }
}
