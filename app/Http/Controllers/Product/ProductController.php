<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\VoteProduct\VoteProductRepository;
use Session;
use DB;
use App\User;
use Auth;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

        /**
     * The VoteProductRepository instance
     *
     * @var voteProRepository
     */
    protected $voteProRepository;

    /**
    * Constructer
    *
    *@param ProductRepository     $productRepository  variable
    *@param CategoryRepository    $categoryRepository variable
    *@param VoteProductRepository $voteProRepository  [description]
    *
    *@return initialized
    */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, VoteProductRepository $voteProRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->voteProRepository = $voteProRepository;
    }

    /**
    *Constructer redirect to index product page with list product of that user
    *
    *@return index page with variable product contain all data in product table
    */
    public function index()
    {
        $listProduct = $this->productRepository->getAllById(Auth::user()->id)->paginate(config('constants.PAGE_PRODUCT_BUSINESS'));
        return view('product.index')->with('listProduct', $listProduct);
    }

    /**
    * Redirect to create product page
    *
    * @return product page
    */
    public function create()
    {
        $listCategory = $this->categoryRepository->all()->pluck('name', 'id');
        return view('product.create')->with(['listCategory'=>$listCategory]);
    }
    /**
    * Method save data into product table
    *
    * @param ProductRequest $request request from client, ProductRequest handle
    *
    * @return mixed
    */
    public function store(ProductRequest $request)
    {
        $this->productRepository->insert($request);
        Session::flash('msg', trans('product.create_product_successful'));
        return redirect()->back();
    }
    /**
    * Method to delete a row in table
    *
    *@param integer $id Id of model will be deleted
    *
    * @return mixed
    */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        Session::flash('msg', trans('product.delete_product_successful'));
        return redirect()->back();
    }

    /**
    * Method to show all detail about product as product_detail, user ordered
    *
    * @param integer $id id of product
    *
    * @return product
    */
    public function show($id)
    {
        $product = $this->productRepository->findById($id);
        if (empty($product)) {
            Session::flash('msg', trans('product.product_not_found'));
            return redirect()->route('product');
        } else {
            $orderDetail=$this->productRepository->orderDetail($id);
            return view('product.show')->with(['product'=>$product, 'orderDetail'=>$orderDetail]);
        }
    }

    /**
    * Method redirect to view edit page
    *
    * @param integer $id id of product
    *
    * @return edit page with product data
    */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        if (empty($product)) {
            Session::flash('msg', trans('product.product_not_found'));
            return redirect()->route('product.index');
        } else {
            $listCategory = $this->categoryRepository->all()->pluck('name', 'id');
            return view('product.edit')->with(['product' => $product, 'listCategory' => $listCategory]);
        }
    }

    /**
    * Method update product
    *
    * @param request $request request from form
    * @param integer $id      id
    *
    * @return mixed
    */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->productRepository->store($request, $id);
        Session::flash('msg', trans('product.update_product_successful'));
        return redirect()->route('product.index');
    }

    /**
    * Show detail product and sibling product
    *
    * @param integer $id id of product
    *
    * @return product
    */
    public function showDetail($id)
    {
        $product = $this->productRepository->findById($id);
        if (empty($product)) {
            Session::flash('msg', trans('product.product_not_found'));
            return redirect()->route('product');
        } else {
            $categories = $this->categoryRepository->allRoot();
            foreach ($categories as $key => $category) {
                $childs[$key] = $this->categoryRepository->findDescendants($category->id);
            }
            $products = $this->productRepository->getByIdCategory($product->category_id, config('constants.LIMIT_PRODUCT_INDEX'));
            $voteProducts = $this->voteProRepository->all();
            $arPointVote = $this->voteProRepository->getArPointVote($products, $voteProducts);
            return view('index.product-detail', compact('id', 'categories', 'childs', 'product', 'products', 'voteProducts', 'arPointVote'));
        }
    }

     /**
      * Filter product by it category
      *
      * @param integer $id id category
      *
      * @return list
      */
    public function filterProduct($id)
    {
        $categories = $this->categoryRepository->allRoot();
        foreach ($categories as $key => $category) {
            $childs[$key] = $this->categoryRepository->findDescendants($category->id);
        }
        $voteProducts = $this->voteProRepository->all();
        $products = $this->productRepository->getAllByIdCategory($id);
        $arPointVote = $this->voteProRepository->getArPointVote($products, $voteProducts);
        return view('index.product', compact('categories', 'childs', 'products', 'voteProducts', 'arPointVote'));
    }
}
