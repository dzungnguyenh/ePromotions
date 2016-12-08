<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\EditEventRequest;
use App\Models\Event;

class EventController extends Controller
{
    protected $event;

    /**
     *Constructor for EventController
     *
     * @param Event $event []
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }
    
    /**
     *Constructor for EventController
     *
     * @return [type]
     */
    public function index()
    {
         $select = [
            'id',
            'title',
            'description',
            'start_time',
            'end_time',
            'place'
         ];
           $data = $this->event->select($select);
           $event = $data->orderBy('id', 'DESC')->paginate(10);
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
        $this->event->create($input);
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

        $event = $this->event->findOrFail($id);
       // return view('event.show', compact('event'));
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
         $event = $this->event->findOrFail($id);
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
        $event = $this->event->findOrFail($id);
        $input = $request->all();
        $event->update($input);
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
        $event = $this->event->findOrFail($id);
        $event->delete($event);
        return redirect()->route('event.index');
    }
}
