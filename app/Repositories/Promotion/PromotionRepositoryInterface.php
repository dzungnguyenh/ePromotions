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
    * Return promotions present
    *
    * @param int      $val   Value id.
    * @param datetime $time  Time now.
    * @param int      $limit Limit promotion earch page.
    *
    * @return mixed
    */
    public function filterExpired($val, $time, $limit = null);

    /**
    * Return promotions present
    *
    * @param int      $val   Value id.
    * @param datetime $time  Time now.
    * @param int      $limit Limit promotion earch page.
    *
    * @return mixed
    */
    public function filterPresent($val, $time, $limit = null);

    /**
    * Return promotions future
    *
    * @param int      $val   Value id.
    * @param datetime $time  Time now.
    * @param int      $limit Limit promotion earch page.
    *
    * @return mixed
    */
    public function filterFuture($val, $time, $limit = null);

    /**
    * Return time
    *
    * @return time
    */
    public function getTime();

    /**
    * Check input day start
    *
    * @param datetime $dateStart Time.
    *
    * @return boolean
    */
    public function checkDateStart($dateStart);

    /**
    * Check error day start
    *
    * @param datetime $dateStart Time.
    *
    * @return string
    */
    public function errorDateStart($dateStart);

    /**
    * Check input day end
    *
    * @param datetime $dateEnd   Time.
    * @param datetime $dateStart Time.
    *
    * @return boolean
    */
    public function checkDateEnd($dateEnd, $dateStart);

    /**
    * Check error day end
    *
    * @param datetime $dateEnd   Time.
    * @param datetime $dateStart Time.
    *
    * @return string
    */
    public function errorDateEnd($dateEnd, $dateStart);

    /**
    * Check isset promotion
    *
    * @param int      $productId Product id.
    * @param datetime $val       Time.
    *
    * @return boolean
    */
    public function checkIssetPromotion($productId, $val);

    /**
    * Get error isset promotion
    *
    * @param datetime $dateStart Time.
    * @param int      $productId Product id.
    *
    * @return string
    */
    public function errorIssetPromotion($dateStart, $productId);

    /**
    * Get error when submit
    *
    * @param datetime $dateStart Time.
    * @param datetime $dateEnd   Time.
    * @param int      $productId Product id.
    *
    * @return array
    */
    public function getError($dateStart, $dateEnd, $productId);

    /**
     * Get limit 4 promotions which being sale off
     * If not, promotions.date_end neartest
     *
     * @return array Categories
     */
    public function getNeartest();
}
