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
    *@param product
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
    *@param redirect product page
    *
    *@return
    */
    public function index()
    {
        $product = $this->productRepository->all();
        return view('product.index')->with('listProduct', $product);
    }

    /**
    * redirect to create product page
    */
    public function create()
    {
        return view('product.create');
    }

    /**
    *
    */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->back();
    }
}
