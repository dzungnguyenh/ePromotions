<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{

    /**
     * Declare model.
     *
     * @var model
     */
    protected $model;

    /**
     * Get all data from model
     *
     * @param array $columns default get all table
     *
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }
    /**
    * Method create new model
    *
    * @param array $data value for create new model
    *
    * @return mixed
    */
    public function create(array $data)
    {
        return $this->model->create($data);
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
    * Delete model by id
    *
     * @param integer $id Field id of model
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
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
