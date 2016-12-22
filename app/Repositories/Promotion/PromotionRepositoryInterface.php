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
    * Return promotions taking place
    *
    * @param int      $val        Value id.
    * @param string   $condition1 Condition character.
    * @param string   $condition2 Condition character.
    * @param datetime $time       Time now.
    * @param int      $limit      Limit promotion earch page.
    *
    * @return mixed
    */
    public function filterByTime($val, $condition1, $condition2, $time, $limit = null);
}
