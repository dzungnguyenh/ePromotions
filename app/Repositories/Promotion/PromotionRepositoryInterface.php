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
     * @param integer $id     id
     * @param array   $inputs input
     *
     * @return boolean
     */
    public function update($id, $inputs);
}
