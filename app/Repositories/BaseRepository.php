<?php
/**
* Base Repository
*/
namespace App\Repositories;

use Exception;
use DB;

abstract class BaseRepository
{
    /**
     * The Model instance
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
     * Find a resource
     *
     * @param int $id [id of model]
     *
     * @return Model
     */
    public function find($id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            throw new Exception(trans('message.find_error'));
        }
        return $data;
    }

    /**
     * Update a resource
     *
     * @param array $inputs [values input text]
     * @param int   $id     [id of model]
     *
     * @return boolean
     */
    public function update($inputs, $id)
    {
        $data = $this->model->where('id', $id)->update($inputs);
        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }
        return $data;
    }

    /**
     * Delete a resource
     *
     * @param int $id [id of model
     *
     * @return boolean
     */
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->model->destroy($id);
            if (!$data) {
                throw new Exception(trans('message.delete_error'));
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
