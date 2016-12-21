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
}
