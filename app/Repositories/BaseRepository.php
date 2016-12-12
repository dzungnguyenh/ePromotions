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
    /**
     * Get by id.
     *
     * @param integer $id id
     *
     * @return Model
     */
    public function get($id)
    {
        return $this->model->find($id);
    }
    /**
     * Delete a resource.
     *
     * @param integer $id id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
    /**
     * Update a resource.
     *
     * @param integer $id     id
     * @param array   $inputs inputs
     *
     * @return Model
     */
    public function update($id, $inputs)
    {
        return $this->model->find($id)->update($inputs);
    }
}
