<?php

namespace App\Repositories\RegisterEvent;

interface RegisterEventRepositoryInterface
{

    /**
     * Register a event
     *
     * @param int $id [id of event]
     *
     * @return boolean
     */
    public function join($id);
}
