<?php

namespace App\Repositories\Event;

interface EventRepositoryInterface
{
    /**
     * Get all Event
     *
     * @return Reponse
     */
    public function all();

    /**
     * Create function
     *
     * @param [type] $input [description]
     *
     * @return [type]        [description]
     */
    public function create($input);

    /**
     * Update function
     *
     * @param [type] $input [description]
     * @param [type] $id    [description]
     *
     * @return [type]        [description]
     */
    public function update($input, $id);

    /**
     *Delete function
     *
     * @param [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function delete($id);
    /**
     *Find function
     *
     * @param [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function find($id);
}
