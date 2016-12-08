<?php
/**
* Base Repository
*/
namespace App\Repositories;

use Exception;

abstract class BaseRepository
{
    /**
     * [The Model instance]
     *
     * @param \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Get all resources
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Creating a new resource
     *
     * @param array $inputs [values input text]
     *
     * @return Model
     */
    public function create($inputs)
    {
        return $this->model->create($inputs);
    }
}
