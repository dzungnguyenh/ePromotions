<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;

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
    * Method to delete a row in table
    *
    *@param integer $id Id of model will be deleted
    *
    * @return mixed
    */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->back();
    }
}
