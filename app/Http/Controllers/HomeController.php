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
    * @param UserRepository        $userRepository      [description]
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
        return view('index.index', compact('categories', 'childs', 'promotions', 'products', 'voteProducts', 'arPointVote', 'events', 'flag'));
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
        $products = $this->productRepository->getAll()->paginate(config('constants.limit_product'));
        return view('index.product', compact('products', 'categories', 'childs'));
    }
    /**
    * Display product research
    *
    * @param Request $request [ value input tag ]
    *
    * @return [type]          [get all product event of search]
    */
    public function research(Request $request)
    {
        $cate = $request->input('category_name');
        $search = $request->input('search');
        $categories = $this->categoryRepository->allRoot();
        foreach ($categories as $key => $category) {
            $childs[$key] = $this->categoryRepository->findDescendants($category->id);
        };
        if ($cate==config('constants.Promotion')) {
            $products = $this->productRepository->getByPromotion($search);
            return view('index.product', compact('products', 'categories', 'childs'));
        } else {
            $products = $this->productRepository->findLike('product_name', $search)->paginate(config('constants.limit_product'));
            return view('index.product', compact('products', 'categories', 'childs'));
        }
    }
}
