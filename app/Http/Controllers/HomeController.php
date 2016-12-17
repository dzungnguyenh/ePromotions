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
     * Display information in index research
     *
     * @return Reponse
     */
    public function research(Request $Request)
    {
        $category = $Request->input('category');
        $search = $Request->input('search');
        if (empty($category)) {
            $category = "Product";
        }
        if ($category=="Product") {
            $result = DB::table('products') -> where('product_name', 'like', '%' . $search . '%') -> orwhere('description', 'like', '%'.$search.'%') -> get();
            return view('index.search_product', compact('$result'));
        } else {
            if ($category=="Promotion") {
                $result= DB::table('promotions')->where('title', 'like', '%'.$search.'%')->orwhere('description', 'like', '%'.$search.'%')->get();
                return view('index.search_promotion', compact('$result'));
            } else {
                 $result= DB::table('events')->where('title', 'like', '%' .$search. '%')->orwhere('description', 'like', '%' .$search. '%')->get();
                 return view('index.search_event', compact('$result'));
            }
        }
    }
    /**
    * Show list all product
    *
    * @return product page
    */
    public function product()
    {
        $products = $this->productRepository->getAll()->paginate(16);
        return view('index.product')->with('products', $products) ;
    }
}
