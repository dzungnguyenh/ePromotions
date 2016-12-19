<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Promotion\PromotionRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Event\EventRepository;
use App\Repositories\VoteProduct\VoteProductRepository;

class HomeController extends Controller
{
    /**
     * The CategoryRepository instance
     *
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * The PromotionRepository instance
     *
     * @var PromotionRepository
     */
    protected $promotionRepository;

    /**
     * The ProductRepository instance
     *
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * The EventRepository instance
     *
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * The VoteProductRepository instance
     *
     * @var voteProRepository
     */
    protected $voteProRepository;
    
   /**
    * Create a new controller instance.
    *
    * @param CategoryRepository    $categoryRepository  [description]
    * @param PromotionRepository   $promotionRepository [description]
    * @param ProductRepository     $productRepository   [description]
    * @param EventRepository       $eventRepository     [description]
    * @param VoteProductRepository $voteProRepository   [description]
    */
    public function __construct(CategoryRepository $categoryRepository, PromotionRepository $promotionRepository, ProductRepository $productRepository, EventRepository $eventRepository, VoteProductRepository $voteProRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->promotionRepository = $promotionRepository;
        $this->productRepository = $productRepository;
        $this->eventRepository = $eventRepository;
        $this->voteProRepository = $voteProRepository;
    }

    /**
     * Display information in index page
     *
     * @return Reponse
     */
    public function index()
    {
        $categoriies = $this->categoryRepository->allRoot();
        $promotions = $this->promotionRepository->all()->take(config('constants.LIMIT_RECORD'));
        $products = $this->productRepository->all()->take(config('constants.LIMIT_RECORD'));
        $voteProducts = $this->voteProRepository->all();
        foreach ($products as $product) {
            foreach ($voteProducts as $voteProduct) {
                if ($voteProduct->product_id == $product->id) {
                    $arPointVote[$product->id] = $this->voteProRepository->getCountByIdProduct($product->id);
                }
            }
        }
        /*
         * Default enable button vote
         */
        $disabled = "";
        $events = $this->eventRepository->all()->take(config('constants.LIMIT_RECORD'));
        return view('index.index', compact('categoriies', 'promotions', 'products', 'events', 'voteProducts', 'arPointVote', 'disabled'));
    }

    public function handlingAjaxVote($productId)
    {
        $voteProducts = $this->voteProRepository->all();
        $countProductId = $this->voteProRepository->getCountByIdProduct($productId);
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
            $this->voteProRepository->create($arVoteProducts);
        }
        return $countProductId;
    }
}
