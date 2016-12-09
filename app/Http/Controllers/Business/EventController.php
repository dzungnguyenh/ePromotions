<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\Event\EventRepository;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\EditEventRequest;

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
     * @return function [index]
     */
    public function index()
    {
           $event = $this->eventRepository->all();
         return view('event.index', ['event'=>$event]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }
    /**
     *Funtion story
     *
     * @param CreateEventRequest $request []
     *
     * @return [type]
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();
        $this->eventRepository->create($input);
        return redirect()->route('event.index');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id []
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);
        return view('event.show', compact('event'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id []
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $event = $this->eventRepository->find($id);
        return view('event.edit', compact('event'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request []
     * @param int                      $id      []
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditEventRequest $request, $id)
    {
        $input=$this->eventRepository->find($id);
        $this->eventRepository->update($input, $id);
        return redirect()->route('event.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id []
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eventRepository->delete($id);
        return redirect()->route('event.index');
    }
}
