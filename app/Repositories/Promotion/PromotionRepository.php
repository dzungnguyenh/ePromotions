<?php

namespace App\Repositories\Promotion;

use App\Repositories\BaseRepository;
use App\Repositories\Promotion\PromotionRepositoryInterface;
use App\Models\Promotion;
 
class PromotionRepository extends BaseRepository implements PromotionRepositoryInterface
{
    protected $model;
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
    * Return promotions expired
    *
    * @param int      $val   Value id.
    * @param datetime $time  Time now.
    * @param int      $limit Limit promotion earch page.
    *
    * @return mixed
    */
    public function filterExpired($val, $time, $limit = null)
    {
        return $this->model->where([
            ['date_end', '<', $time],
            ['product_id', '=', $val],
        ])->paginate($limit);
    }

    /**
    * Return promotions present
    *
    * @param int      $val   Value id.
    * @param datetime $time  Time now.
    * @param int      $limit Limit promotion earch page.
    *
    * @return mixed
    */
    public function filterPresent($val, $time, $limit = null)
    {
        return $this->model->where([
            ['date_start', '<', $time],
            ['date_end', '>', $time],
            ['product_id', '=', $val],
        ])->paginate($limit);
    }

    /**
    * Return promotions future
    *
    * @param int      $val   Value id.
    * @param datetime $time  Time now.
    * @param int      $limit Limit promotion earch page.
    *
    * @return mixed
    */
    public function filterFuture($val, $time, $limit = null)
    {
        return $this->model->where([
            ['date_start', '>', $time],
            ['product_id', '=', $val],
        ])->paginate($limit);
    }

    /**
    * Return time
    *
    * @return time
    */
    public function getTime()
    {
        return date(config('date.format_timestamps'), time());
    }
}
