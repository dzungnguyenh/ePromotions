<?php

namespace App\Repositories\RegisterEvent;

use App\Repositories\BaseRepository;
use App\Repositories\RegisterEvent\RegisterEventRepositoryInterface;
use App\Models\RegisterEvent;
use Auth;

class RegisterEventRepository extends BaseRepository implements RegisterEventRepositoryInterface
{

    /**
     * The RegisterEvent instance.
     *
     * @param RegisterEvent $registerEvent [description]
     */
    public function __construct(RegisterEvent $registerEvent)
    {
        $this->model = $registerEvent;
    }

    /**
     * Check user has been register event
     *
     * @param int $eventId [id of event]
     *
     * @return Reponse
     */
    public function checkJoin($eventId)
    {
        $data = RegisterEvent::where('user_id', Auth::user()->id)->where('event_id', $eventId)->first();
        return $data;
    }

    /**
     * Register a event
     *
     * @param int $id [id of event]
     *
     * @return boolean
     */
    public function join($id)
    {
        try {
            $data = RegisterEvent::create([
                'user_id' => Auth::user()->id,
                'event_id' => $id,
            ]);
        } catch (Exception $e) {
            return redirect('/')->withError(trans('event.cant_not_register_event'));
        }
        if (!$data) {
            throw new Exception(trans('event.register_event_error'));
        }
        return $data;
    }

    /**
     * Get list history join event
     *
     * @return Response
     */
    public function getJoinEvent()
    {
        return $this->model->with('event')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(trans('event.limit_paginate_history_join'));
    }
}
