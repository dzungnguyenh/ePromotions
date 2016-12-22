<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VoteProduct\VoteProductRepository;
use App\Repositories\Point\PointRepository;

class ProductController extends Controller
{
    /**
     * The VoteProductRepository instance
     *
     * @var voteProRepository
     */
    protected $voteProRepository;

    /**
     * The PointRepository instance
     *
     * @var pointRepository
     */
    protected $pointRepository;

    /**
    * Create a new controller instance.
    *
    * @param VoteProductRepository $voteProRepository [description]
    * @param PointRepository       $pointRepository   [description]
    */
    public function __construct(VoteProductRepository $voteProRepository, PointRepository $pointRepository)
    {
        $this->voteProRepository = $voteProRepository;
        $this->pointRepository = $pointRepository;
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
        $pointLatest = $this->pointRepository->getLatestPoint();
        $pointVote = $pointLatest[config('constants.ZERO')]["vote"];
        return $this->voteProRepository->handlingAjaxVote($productId, $pointVote);
    }
}
