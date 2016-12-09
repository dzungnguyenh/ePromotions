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
     * @param array $columns Array data will be return
     *
     * @return \Illuminate\Support\Collection
     */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
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
        $rowUpdate = $this->model->findOrFail($id);
        $rowUpdate->update($input);
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
        $rowDelete = $this->model->findOrFail($id);
        $rowDelete->delete($id);
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
    /**
    * Method update model
    *
    * @param array   $data      Fields be change
    * @param integer $id        Id of model
    * @param string  $attribute name of field be compare
    *
    * @return mixed
    */
    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
    * Search and return array model by id.
    *
     * @param integer $id      Id of model.
     * @param array   $columns Name field in table
     *
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    /**
    * [Return data match parameter]
    *
    * @param string $attribute Name field table.
    * @param string $value     Value of field table.
    * @param array  $columns   Name field in table
    *
    * @return mixed
    */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
}
