<?php

namespace App\Repositories\VoteProduct;

use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository;
use App\Repositories\VoteProduct\VoteProductRepositoryInterface;
use App\Models\VoteProduct;

class VoteProductRepository extends BaseRepository implements VoteProductRepositoryInterface
{
    /**
     * The VoteProduct instance
     *
     * @param VoteProduct $voteProduct [description]
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

    /**
     * Get array point vote from table vote_products
     *
     * @param array $products     [description]
     * @param array $voteProducts [description]
     *
     * @return count
     */
    public function getArPointVote($products, $voteProducts)
    {
        $arPointVote = array();
        foreach ($products as $product) {
            foreach ($voteProducts as $voteProduct) {
                if ($voteProduct->product_id == $product->id) {
                    $arPointVote[$product->id] = $this->getCountByIdProduct($product->id);
                }
            }
        }
        return $arPointVote;
    }

    /**
     * Ajax handling vote
     *
     * @param int $productId [id of product]
     *
     * @return count
     */
    public function handlingAjaxVote($productId)
    {
        $voteProducts = $this->model->all();
        $countProductId = $this->getCountByIdProduct($productId);
        $flag = true;
        foreach ($voteProducts as $voteProduct) {
            if ((Auth::user()->id == $voteProduct->user_id) && ($voteProduct->product_id == $productId)) {
                $flag = false;
            }
        }
        if ($flag) {
            $countProductId++;
            $arVoteProducts = array(
                    'user_id' => Auth::user()->id,
                    'product_id' => $productId,
                );
            $this->model->create($arVoteProducts);
        }
        return $countProductId;
    }
}
