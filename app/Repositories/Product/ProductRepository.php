<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;
use Carbon\Carbon;

class ProductRepository extends BaseRepository
{

    /**
    * All of the registered after callbacks.
    *
    * @var product
    */
    protected $model;

    /**
    * Create a new  instance.
    *
    * @param Product $product an variable Product
    *
    * @return void
    */
    public function __construct(Product $product)
    {
        $this->model=$product;
    }

    /**
    * Method insert data into product model
    *
    * @param Request $request request from client
    *
    * @return mixed
    */
    public function insert($request)
    {
        $file = $request->file('picture');
        $now = Carbon::now();
        $pictureName = $now->toDateTimeString().$file->getClientOriginalName();
        $path=config('path.picture_product');
        $file->move($path, $pictureName);

        return $this->model->create([
                'user_id'=>$request->user_id,
                'product_name'=>$request->product_name,
                'price'=>$request->price,
                'description'=>$request->description,
                'quantity'=>$request->quantity,
                'picture'=>$pictureName,
                'category_id'=>$request->category_id,
            ]);
    }
}
