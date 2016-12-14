<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Category\CategoryRepository;
use Session;
use DB;
use App\User;
use Auth;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    
    /**
    * Constructer
    *
    *@param ProductRepository  $productRepository  variable
    *@param CategoryRepository $categoryRepository variable
    *
    *@return initialized
    */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->middleware('business');
    }

     /**
    *Constructer redirect to index product page with list product of that user
    *
    *@return index page with variable product contain all data in product table
    */
    public function index()
    {
        $listProduct = $this->productRepository->findBy('user_id', Auth::user()->id);
        return view('product.index')->with('listProduct', $listProduct);
    }

    /**
    * Redirect to create product page
    *
    * @return product page
    */
    public function create()
    {
        $listCategory = $this->categoryRepository->all()->pluck('category_name', 'id');
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
        $product = $this->productRepository->find($id);
        if (empty($product)) {
            Session::flash('msg', trans('product.product_not_found'));
            return Redirect::route('product');
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
            return Redirect::route('product');
        } else {
            $listCategory = $this->categoryRepository->all()->pluck('category_name', 'id');
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
        return redirect('product');
    }
}
