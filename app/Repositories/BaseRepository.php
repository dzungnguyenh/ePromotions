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
     * Get all row in database table.
     *
     * @return list all rows.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * [create row in table]
     *
     * @param [type] $input [value save in table]
     *
     * @return [type]        [row new in table]
     */
    public function create($input)
    {
        $this->model->create($input);
    }

    /**
     * [get value find]
     *
     * @param [type] $id [place in table find]
     *
     * @return [type]     [get value find]
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * [update in table]
     *
     * @param [type] $input [value update in table]
     * @param [type] $id    [place edit in table]
     *
     * @return [type]        [update table]
     */
    public function update($input, $id)
    {
        $rowUpdate = $this->model->findOrFail($id);
        $rowUpdate->update($input);
    }

     /**
      * [delete a line in the tabl]
      *
      * @param [type] $id [place delete]
      *
      * @return [type]     [table have deleted a line in it]
      */
    public function delete($id)
    {
        $rowDelete = $this->model->findOrFail($id);
        $rowDelete->delete($id);
    }
}
