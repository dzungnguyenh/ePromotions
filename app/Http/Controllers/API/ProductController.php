<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VoteProduct\VoteProductRepository;

class ProductController extends Controller
{
        /**
     * The VoteProductRepository instance
     *
     * @var voteProRepository
     */
    protected $voteProRepository;

    /**
    * Create a new controller instance.
    *
    * @param VoteProductRepository $voteProRepository [description]
    */
    public function __construct(VoteProductRepository $voteProRepository)
    {
        $this->voteProRepository = $voteProRepository;
    }

    /**
     * Ajax handling vote
     *
     * @param int $productId description
     *
     * @return int
     */
    public function handlingAjaxVote($productId)
    {
        return $this->voteProRepository->handlingAjaxVote($productId);
    }
}
