<?php

namespace App\Repositories\VoteProduct;

use App\Repositories\BaseRepository;
use App\Repositories\VoteProduct\VoteProductRepositoryInterface;
use App\Models\VoteProduct;

class VoteProductRepository extends BaseRepository implements VoteProductRepositoryInterface
{
    /**
     * The VoteProduct instance
     *
     * @param VoteProduct $voteProduct [description]
     *
     * @return void
     */
    public function __construct(VoteProduct $voteProduct)
    {
        $this->model = $voteProduct;
    }

    /**
     * Count product_id by productId
     *
     * @param int $productId [id of product]
     *
     * @return count
     */
    public function getCountByIdProduct($productId)
    {
        return $this->model->where('product_id', '=', $productId)->count();
    }
}
