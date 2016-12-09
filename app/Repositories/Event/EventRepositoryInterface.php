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
     * @param [type] $input [value of form request]
     *
     * @return [type]        [create function]
     */
    public function create($input);

    /**
     * Update function
     *
     * @param [type] $input [value of form request]
     * @param [type] $id    [place update]
     *
     * @return [type]        [update value]
     */
    public function update($input, $id);

    /**
     *Delete function
     *
     * @param [type] $id [value place delete]
     *
     * @return [type]     [delete event detail]
     */
    public function delete($id);
    /**
     *Find function
     *
     * @param [type] $id [place in event table]
     *
     * @return [type]     [search by id in the model]
     */
    public function find($id);
}
