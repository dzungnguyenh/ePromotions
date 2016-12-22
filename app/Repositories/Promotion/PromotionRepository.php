<?php

namespace App\Repositories\Promotion;

use App\Repositories\BaseRepository;
use App\Repositories\Promotion\PromotionRepositoryInterface;
use App\Models\Promotion;
 
class PromotionRepository extends BaseRepository implements PromotionRepositoryInterface
{
    /**
     * Promotion constructor.
     *
     * @param Promotion $model description
     *
     * @return void
     */
    public function __construct(Promotion $model)
    {
        $this->model = $model;
    }

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
    public function filterByTime($val, $condition1, $condition2, $time, $limit = null)
    {
        return $this->model->where([
            ['date_start', $condition1 ,$time],
            ['date_end', $condition2 , $time],
            ['product_id', '=', $val],
        ])->paginate($limit);
    }
}
