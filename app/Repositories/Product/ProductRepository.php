<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository
{

    /**
    * Product
    * @param model
    */
    protected $model;
    
    /**
    * Constructer
    *
    * @param model product
    *
    * @return product
    */
    public function __construct(Product $product)
    {
        $this->model=$product;
    }
}
