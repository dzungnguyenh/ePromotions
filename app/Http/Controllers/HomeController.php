<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Promotion\PromotionRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Event\EventRepository;
use App\Repositories\User\UserRepository;
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
     * The userRepository instance
     *
     * @var userRepository
     */
    protected $userRepository;
    
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
    public function __construct(CategoryRepository $categoryRepository, PromotionRepository $promotionRepository, ProductRepository $productRepository, EventRepository $eventRepository, VoteProductRepository $voteProRepository, UserRepository $userRepository)

    {
        $this->categoryRepository = $categoryRepository;
        $this->promotionRepository = $promotionRepository;
        $this->productRepository = $productRepository;
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
        $this->voteProRepository = $voteProRepository;
    }

    /**
     * Display information in index page
     *
     * @return Reponse
     */
    public function index()
    {
        $categories = $this->categoryRepository->allRoot();
        foreach ($categories as $key => $category) {
            $childs[$key] = $this->categoryRepository->findDescendants($category->id);
        }
        $promotions = $this->promotionRepository->all()->take(config('constants.LIMIT_RECORD'));
        $products = $this->productRepository->all()->take(config('constants.LIMIT_RECORD'));
        $voteProducts = $this->voteProRepository->all();
        $arPointVote = $this->voteProRepository->getArPointVote($products, $voteProducts);
        $events = $this->eventRepository->all()->take(config('constants.LIMIT_RECORD'));
        $flag = $this->userRepository->checkLogin();
        return view('index.index', compact('categories', 'childs', 'promotions', 'products', 'voteProducts', 'arPointVote', 'events','flag'));
    }

    /**
    * Show list all product
    *
    * @return product page
    */
    public function product()
    {
        $categories = $this->categoryRepository->allRoot();
        foreach ($categories as $key => $category) {
            $childs[$key] = $this->categoryRepository->findDescendants($category->id);
        }
        $products = $this->productRepository->getAll()->paginate(config('constants.PAGE_PRODUCT_USER'));
        return view('index.product', compact('products', 'categories', 'childs'));
    }
}
