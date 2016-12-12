<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Session;

class ProductController extends Controller
{
    protected $productRepository;
    
    /**
    * Constructer
    *
    *@param ProductRepository $productRepository variable
    *
    *@return
    */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->middleware('business');
    }

     /**
    *Constructer
    *
    *@return index page with variable product contain all data in product table
    */
    public function index()
    {
        $product = $this->productRepository->all();
        return view('product.index')->with('listProduct', $product);
    }

    /**
    * Redirect to create product page
    *
    * @return product page
    */
    public function create()
    {
        return view('product.create');
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
    * Method to show prouct by id
    *
    * @param integer $id id of product
    *
    * @return product
    */
    public function show($id)
    {
        $product = $this->productRepository->find($id);
        if(empty($product)) {
            Session::flash('msg', trans('product.product_not_found'));
            return Redirect::route('product');
        } else {
            return view('product.show')->with('product', $product);
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
