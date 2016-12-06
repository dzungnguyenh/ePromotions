<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    /**
    *all method
    *@param
    *
    *@return
    */
    public function all($columns = array(*));

    /**
    *all method create
    *@param
    *@return
    */
    public function create(array $data);

    /**
    *all method update
    *@param
    *@return
    */
    public function update(array $data, $id, $attribute = "id");

    /**
    *all method update
    *@param
    *@return
    */
    public function delete($id);

    /**
    *all method find
    *@param
    *@return
    */
    public function find($id, $columns = array(*));

    /** findBy
    *all method
    *@param
    *@return
    */
    public function findBy($attribute, $value, $columns = array(*));
}
