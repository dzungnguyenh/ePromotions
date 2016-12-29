<?php

namespace App\Repositories\Book;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\Book\BookRepositoryInterface;
use App\Models\Book;
use Auth;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
     * The Book instance
     *
     * @param Book $book [description]
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    /**
    * Get all order by a user
    *
    * @param integer $id user_id field in books table
    *
    * @return collection
    */
    public function getAllByUser($id)
    {
        return $this->model
        ->join('book_details', 'books.id', 'book_details.book_id')
        ->join('products', 'book_details.product_id', 'products.id')
        ->where('books.user_id', $id)->select('*', 'book_details.quantity', 'book_details.price')->get();
    }

    /**
    * Method get all orders by business
    *
    * @return collection
    */
    public function getAllByBusiness()
    {
        return $this->model
        ->join('book_details', 'books.id', 'book_details.book_id')
        ->join('products', 'book_details.product_id', 'products.id')
        ->join('user', 'books.user_id', 'user.id')
        ->where('products.user_id', Auth::user()->id)
        ->select('*', 'book_details.id', 'book_details.id as bookDetailId', 'book_details.quantity as book_quantity')
        ->get();
    }

    /**
    * Search  orders by business, pattern
    *
    * @param integer $id   user_id in product table
    * @param integer $user id of user table
    *
    * @return collection
    */
    public function search($id, $user)
    {
        return $this->model
        ->join('book_details', 'books.id', 'book_details.book_id')
        ->join('products', 'book_details.product_id', 'products.id')
        ->join('user', 'books.user_id', 'user.id')
        ->where('products.user_id', $user)
        ->orwhere('products.product_name', 'like', "%$id%")
        ->orWhere('user.name', 'like', "%$id%")
        ->select('*', 'book_details.id', 'book_details.quantity as book_quantity')
        ->get();
    }

    /**
     * Handle accept order ò business
     *
     * @param int $orderId   [id of book_details]
     * @param int $pointBook [point book]
     *
     * @return response
     */
    public function handleAcceptOrder($orderId, $pointBook)
    {
        $this->updateQuantityProduc($orderId);
        DB::table('book_details')->where('id', $orderId)->update(['status'=>config('constants.STATUS_ONE')]);
        $newPoint = Auth::user()->point + $pointBook;
        DB::table('user')->where('id', Auth::user()->id)->update(['point' => $newPoint]);
        return response()->json(trans('book.success'));
    }

    /**
     * [updateQuantityProduc at accept odder]
     *
     * @param [type] $orderId [id of order detail]
     *
     * @return [type]          [null]
     */
    public function updateQuantityProduc($orderId)
    {
        $getBookDetail=DB::table('book_details')
        ->select('product_id', 'quantity')
        ->where('id', $orderId)->first();
        $quantityProduct=DB::table('products')
        ->select('quantity')
        ->where('id', $getBookDetail->product_id)
        ->first();
        DB::table('products')
        ->where('id', $getBookDetail->product_id)
        ->update(['quantity'=>($quantityProduct->quantity - $getBookDetail->quantity)]);
    }
}
