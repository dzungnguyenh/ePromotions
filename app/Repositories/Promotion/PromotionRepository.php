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
     * [getByProduct description]
     *
     * @param [type] $search [Search product by promotion]
     * @param [type] $limit  [limit colum]
     *
     * @return [type]         [get all colum of search]
     */
    public function getByPromotion($search, $limit)
    {
        return $this->model::with('product')->whereHas('product', function ($query) use ($search) {
            $query->where('product_name', 'like', '%'.$search.'%')->where('date_start', '<=', date('Y-m-d H:i:s'))->where('date_end', '>=', date('Y-m-d H:i:s'));
        })->paginate($limit);
    }
}
