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
}
