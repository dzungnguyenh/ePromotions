<?php

namespace App\Repositories\Promotion;

interface PromotionRepositoryInterface
{
    /**
     * Get all promotion.
     *
     * @return Reponse
     */
    public function all();

    /**
     * Create a new promotion.
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
    * @param string $attribute Name field table
    * @param string $value     Value of field table
    *
    * @return mixed
    */
    public function findBy($attribute, $value);

    /**
    * Return promotions present.
    *
    * @param int      $val   Value id
    * @param datetime $time  Time now
    * @param int      $limit Limit promotion earch page
    *
    * @return mixed
    */
    public function filterExpired($val, $time, $limit = null);

    /**
    * Return promotions present.
    *
    * @param int      $val   Value id
    * @param datetime $time  Time now
    * @param int      $limit Limit promotion earch page
    *
    * @return mixed
    */
    public function filterPresent($val, $time, $limit = null);

    /**
    * Return promotions future.
    *
    * @param int      $val   Value id
    * @param datetime $time  Time now
    * @param int      $limit Limit promotion earch page
    *
    * @return mixed
    */
    public function filterFuture($val, $time, $limit = null);

    /**
    * Return time.
    *
    * @return time
    */
    public function getTime();

    /**
    * Check value input date.
    *
    * @param datetime $dateStart Time
    * @param datetime $dateEnd   Time
    *
    * @return string
    */
    public function checkDate($dateStart, $dateEnd);

    /**
    * Check isset promotion when store.
    *
    * @param int      $productId Product id
    * @param datetime $dateStart Time
    * @param datetime $dateEnd   Time
    *
    * @return string
    */
    public function checkIssetStore($productId, $dateStart, $dateEnd);

    /**
    * Get error when store.
    *
    * @param int      $productId Product id
    * @param datetime $dateStart Time
    * @param datetime $dateEnd   Time
    *
    * @return array
    */
    public function getErrorStore($productId, $dateStart, $dateEnd);

    /**
    * Check isset promotion when update.
    *
    * @param int      $promotionId Promotion id
    * @param datetime $dateStart   Time
    * @param datetime $dateEnd     Time
    *
    * @return string
    */
    public function checkIssetUpdate($promotionId, $dateStart, $dateEnd);

    /**
    * Get error when update.
    *
    * @param int      $promotionId Promotion id
    * @param datetime $dateStart   Time
    * @param datetime $dateEnd     Time
    *
    * @return array
    */
    public function getErrorUpdate($promotionId, $dateStart, $dateEnd);
    
    /**
     * Get limit 4 promotions which being sale off
     * If not, promotions.date_end neartest
     *
     * @return array Categories
     */
    public function getNeartest();

    /**
    * Get name image when upload success
    *
    * @param file   $image file.
    * @param string $path  path.
    *
    * @return string
    */
    public function uploadImage($image, $path);
}
