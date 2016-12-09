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
     * [create description]
     *
     * @param [type] $input [description]
     *
     * @return [type]        [description]
     */
    public function create($input)
    {
        $this->model->create($input);
    }

    /**
     * [find description]
     *
     * @param [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * [update description]
     *
     * @param [type] $input [description]
     * @param [type] $id    [description]
     *
     * @return [type]        [description]
     */
    public function update($input, $id)
    {
        $row_update = $this->model->findOrFail($id);
        $row_update->update($input);
    }

     /**
      * [delete description]
      *
      * @param [type] $id [description]
      *
      * @return [type]     [description]
      */
    public function delete($id)
    {
        $row_delete = $this->model->findOrFail($id);
        $row_delete->delete($id);
    }
}
