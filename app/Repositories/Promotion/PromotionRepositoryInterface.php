<?php

namespace App\Repositories\Promotion;
 
interface PromotionRepositoryInterface
{
    /**
     * Get all promotion
     *
     * @return Reponse
     */
    public function all();

    /**
     * Create a new promotion
     *
     * @param array $inputs input
     *
     * @return Promotion
     */
    public function create($inputs);

    /**
     * Get by id promotion.
     *
     * @param integer $id id
     *
     * @return boolean
     */
    public function find($id);

    /**
     * Delete a promotion.
     *
     * @param integer $id id
     *
     * @return boolean
     */
    public function delete($id);

    /**
     * Update a promotion.
     *
     * @param array   $inputs promotion
     * @param integer $id     id promotion
     *
     * @return boolean
     */
    public function update($inputs, $id);

    /**
    * [Return data match parameter]
    *
    * @param string $attribute Name field table.
    * @param string $value     Value of field table.
    *
    * @return mixed
    */
    public function findBy($attribute, $value);

    /**
    * [Return data match parameter]
    *
    * @param string   $attribute1 Name field table.
    * @param string   $attribute2 Name field table.
    * @param string   $attribute3 Name field table.
    * @param string   $value1     Value of field table.
    * @param string   $value2     Value of field table.
    * @param datetime $time       Value time.
    * @param int      $limit      Number of item.
    *
    * @return mixed
    */
    public function findByAny($attribute1, $attribute2, $attribute3, $value1, $value2, $time, $limit = null);
}
