<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;
use Carbon\Carbon;
use DB;

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
        $pictureName = $this->saveFile($request->file('picture'));
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

    /**
    * Method to get all data order_detail, customer_detail by id_product
    *
    * @param integer $id id of product
    *
    * @return all data order_detail, customer_detail
    */
    public function orderDetail($id)
    {
        return DB::table('books')
        ->join('book_details', 'books.id', '=', 'book_details.book_id')
        ->join('user', 'user.id', '=', 'books.user_id')
        ->where('book_details.product_id', $id)
        ->select('*')
        ->get();
    }

    /**
    * Method to update product
    *
    * @param request $request data from form
    * @param integer $id      id of product
    *
    * @return true
    */
    public function store($request, $id)
    {
        $product = $this->model->findOrFail($id);
        $file = $request->file('picture');
        $pictureName = '';
        // If update file then insert file into folder img and change picture in database
        if ($file) {
            $pictureName = $this->saveFile($file);
        } else {
            $pictureName = $product->picture;
        }
        return $product->update([
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'picture'=>$pictureName,
            'category_id'=>$request->category_id,
        ]);
    }

    /**
    * Method save  file into folder
    *
    * @param file $file file get from form.
    *
    * @return picture name to save into database
    */
    public function saveFile($file)
    {
        $now = Carbon::now();
        $pictureName = $now->toDateTimeString().$file->getClientOriginalName();
        $path=config('path.picture_product');
        $file->move($path, $pictureName);
        return $pictureName;
    }

    /**
    * Method save  file into folder
    *
    * @param file $file file get from form.
    *
    * @return picture name to save into database
    */
    public function get($file)
    {
        $now = Carbon::now();
        $pictureName = $now->toDateTimeString().$file->getClientOriginalName();
        $path=config('path.picture_product');
        $file->move($path, $pictureName);
        return $pictureName;
    }

    /**
    * Method get all product,name category by userId
    *
    * @param integer $id id of Hotel
    *
    * @return array products, categories
    */
    public function getAllById($id)
    {
        return $this->model->leftjoin('categories', 'categories.id', '=', 'products.category_id')
        ->where('user_id', $id)
        ->paginate(5);
    }

    /**
    * Get all  product  sort by order_value
    *
    * @param string $order filed to sort
    *
    * @return list product
    */
    public function getAll($order = 'products.id')
    {
        return $this->model
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('user', 'products.user_id', '=', 'user.id')
        ->select('products.id', 'product_name', 'price', 'description', 'quantity', 'picture', 'categories.name as category_name', 'user.name as user_name', 'email', 'phone', 'address', 'avatar', 'products.created_at')
        ->orderBy($order);
    }

    /**
    * Get product, category_name by id
    *
    * @param integer $id id of product
    *
    * @return product
    */
    public function findById($id)
    {
        return $this->model
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->where('products.id', $id)
        ->first();
    }

    /**
     * [getByProduct description]
     *
     * @param [type] $search [Search product by promotion]
     *
     * @return [type]         [get all colum of search]
     */
    public function getByPromotion($search)
    {
        return $this->model->with('promotion')->where('product_name', 'like', '%'.$search.'%')
        ->whereHas('promotion', function ($query) {
            $query->where('date_start', '<=', date(config('date.date_system')))->where('date_end', '>=', date(config('date.date_system')));
        })->paginate(config('constants.limit_product'));
    }
    /**
     * Get list of products by id category
     *
     * @param integer $id Id category
     *
     * @return array     List of products
     */
    public function getByIdCategory($id)
    {
        return $this->model
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->where('categories.id', $id)->select('*', 'products.id')->get();
    }
}
