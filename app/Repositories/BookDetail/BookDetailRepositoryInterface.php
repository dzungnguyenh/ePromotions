<?php

namespace App\Repositories\BookDetail;

interface BookDetailRepositoryInterface
{
    /**
     * Get all points
     *
     * @return Reponse
     */
    public function all();

    /**
     * Create a new point
     *
     * @param array $inputs [values input text]
     *
     * @return Point
     */
    public function create($inputs);

    /**
     * Find a point
     *
     * @param int $id [id of point update]
     *
     * @return Point
     */
    public function find($id);

    /**
     * Update a point
     *
     * @param array $inputs [values input text]
     * @param int   $id     [id of point]
     *
     * @return boolean
     */
    public function update($inputs, $id);

    /**
     * Delete a point
     *
     * @param int $id [id of point delete]
     *
     * @return boolean
     */
    public function delete($id);
}
