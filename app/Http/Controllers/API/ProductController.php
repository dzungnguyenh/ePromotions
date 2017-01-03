<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VoteProduct\VoteProductRepository;
use App\Repositories\Point\PointRepository;
use App\Repositories\Book\BookRepository;
use Auth;

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
     * The BookRepository instance
     *
     * @var bookRepository
     */
    protected $bookRepository;

    /**
    * Create a new controller instance.
    *
    * @param VoteProductRepository $voteProRepository [description]
    * @param PointRepository       $pointRepository   [description]
    * @param BookRepository        $bookRepository    [description]
    */
    public function __construct(VoteProductRepository $voteProRepository, PointRepository $pointRepository, BookRepository $bookRepository)
    {
        $this->voteProRepository = $voteProRepository;
        $this->pointRepository = $pointRepository;
        $this->bookRepository = $bookRepository;
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

    /**
     * Handle accept order by business
     *
     * @param int $orderId description
     *
     * @return response
     */
    public function handleAcceptOrder($orderId)
    {
        $pointLatest = $this->pointRepository->getLatestPoint();
        $pointBook = $pointLatest[config('constants.ZERO')]["book"];
        return $this->bookRepository->handleAcceptOrder($orderId, $pointBook);
    }

    /**
     * Handle share of user
     *
     * @param int $productId description
     *
     * @return response
     */
    public function handleShare($productId)
    {
        if (!(Auth::guest())) {
            $pointLatest = $this->pointRepository->getLatestPoint();
            $pointShare = $pointLatest[config('constants.ZERO')]["share"];
            return $this->bookRepository->handleShare($productId, $pointShare);
        } else {
            return null;
        }
    }
}
