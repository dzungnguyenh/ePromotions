<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Promotion\PromotionRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Event\EventRepository;
use App\Repositories\User\UserRepository;

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
    * Create a new controller instance.
    *
    * @param CategoryRepository  $categoryRepository  [description]
    * @param PromotionRepository $promotionRepository [description]
    * @param ProductRepository   $productRepository   [description]
    * @param EventRepository     $eventRepository     [description]
    * @param UserRepository      $userRepository      [description]
    */
    public function __construct(CategoryRepository $categoryRepository, PromotionRepository $promotionRepository, ProductRepository $productRepository, EventRepository $eventRepository, UserRepository $userRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->promotionRepository = $promotionRepository;
        $this->productRepository = $productRepository;
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
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
        $events = $this->eventRepository->all()->take(config('constants.LIMIT_RECORD'));
        $flag = $this->userRepository->checkLogin();
        return view('index.index', compact('categoriies', 'promotions', 'products', 'events', 'flag'));
    }
}
