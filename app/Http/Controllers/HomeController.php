<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Promotion\PromotionRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Event\EventRepository;
use DB;

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
    * Create a new controller instance.
    *
    * @param CategoryRepository  $categoryRepository  [description]
    * @param PromotionRepository $promotionRepository [description]
    * @param ProductRepository   $productRepository   [description]
    * @param EventRepository     $eventRepository     [description]
    */
    public function __construct(CategoryRepository $categoryRepository, PromotionRepository $promotionRepository, ProductRepository $productRepository, EventRepository $eventRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->promotionRepository = $promotionRepository;
        $this->productRepository = $productRepository;
        $this->eventRepository = $eventRepository;
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
        return view('index.index', compact('categoriies', 'promotions', 'products', 'events'));
    }
    /**
    * Show list all product
    *
    * @return product page
    */
    public function product()
    {
        $products = $this->productRepository->getAll()->paginate(16);
        // dd($products);
        return view('index.product')->with('products', $products);
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
        $category = $request->input('category');
        $search = $request->input('search');
        if ($category=="Promotion") {
            $products = $this->productRepository->getByPromotion($search);
            return view('index.product')->with('products', $products);
        } else {
            $products = $this->productRepository->findLike('product_name', $search)->paginate(16);
            return view('index.product')->with('products', $products);
        }
    }
}
