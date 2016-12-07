<?php

namespace App\Repositories\Point;

interface PointRepositoryInterface
{
    /**
     * [Get all points]
     *
     * @return [Reponse]
     */
    public function all();

    /**
     * [Create a new point]
     *
     * @param array $inputs [values input text]
     *
     * @return Point
     */
    public function create($inputs);
}
