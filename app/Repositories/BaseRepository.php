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

    /**
    * [Return data match parameter]
    *
    * @param string $attribute Name field table.
    * @param string $value     Value of field table.
    * @param int    $limit     Number of item.
    *
    * @return mixed
    */
    public function findBy($attribute, $value, $limit = null)
    {
        return $this->model->where($attribute, '=', $value)->paginate($limit);
    }

    /**
    * [Return data match parameter]
    *
    * @param string $attribute Name field table.
    * @param string $value     Value of field table.
    * @param int    $limit     Number of item.
    *
    * @return mixed
    */
    public function findEliminate($attribute, $value, $limit = null)
    {
        return $this->model->where($attribute, '<>', $value)->paginate($limit);
    }

    /**
     * Paginate in view
     *
     * @param int $limit [limit records per page]
     *
     * @return array
     */
    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }
    /**
     * [find Like product]
     *
     * @param [type] $attribute [field name]
     * @param [type] $value     [value search]
     *
     * @return [type]            [all colum of search]
     */
    public function findLike($attribute, $value)
    {
        return $this->model->where($attribute, 'like', '%'.$value.'%');
    }
    /**
     * [count number colums in table]
     *
     * @return array
     */
    public function count()
    {
        return $this->model->count();
    }
}
