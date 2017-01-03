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
        ->select('*', 'book_details.id', 'book_details.id as bookDetailId', 'book_details.quantity as book_quantity', 'book_details.created_at', 'book_details.price')
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
        $this->updateQttPromotion($orderId);
        DB::table('book_details')->where('id', $orderId)->update(['status'=>config('constants.STATUS_ONE')]);
        $idUserBooks = $this->model->join('book_details', 'book_details.book_id', '=', 'books.id')
                    ->join('user', 'user.id', '=', 'books.user_id')
                    ->select('books.user_id', 'user.point')
                    ->where('book_details.id', '=', $orderId)
                    ->first();
        $newPoint = $idUserBooks->point + $pointBook;
        DB::table('user')->where('id', $idUserBooks->user_id)->update(['point' => $newPoint]);
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

    /**
     * Handle share of user
     *
     * @param int $productId  [id of product]
     * @param int $pointShare [point share]
     *
     * @return response
     */
    public function handleShare($productId, $pointShare)
    {
        $newPoint = Auth::user()->point;
        if (!(Auth::guest())) {
            $arGetUserShare = array(
                    'user_id' => Auth::user()->id,
                    'product_id' => $productId,
                );
            $userShare = DB::table('share_products')->where($arGetUserShare)->first();
            if (empty($userShare)) {
                $arGetUserShare = array(
                        'user_id' => Auth::user()->id,
                        'product_id' => $productId,
                        'count' => $pointShare,
                    );
                DB::table('share_products')->insert($arGetUserShare);
            } else {
                $userShare->count++;
                DB::table('share_products')->update(['count' => $userShare->count]);
            }
            $newPoint += $pointShare;
            DB::table('user')->where('id', Auth::user()->id)->update(['point' => $newPoint]);
        }
        return response()->json($newPoint);
    }
  
    /**
     * [updateQttPromotion at accept order]
     *
     * @param [type] $orderId [id of order detail]
     *
     * @return [type]          [null]
     */
    public function updateQttPromotion($orderId)
    {
        $getBookDetail=DB::table('book_details')
        ->join('products', 'products.id', 'book_details.product_id')
        ->select('book_details.price as price_book', 'book_details.quantity', 'products.price as price_product', 'book_details.created_at as date_create')
        ->where('book_details.id', '=', $orderId)
        ->first();
        if (($getBookDetail->price_book/$getBookDetail->quantity) != ($getBookDetail->price_product)) {
            $promotion=DB::table('promotions')
            ->select('quantity', 'id')
            ->where('date_start', '<=', $getBookDetail->date_create)
            ->where('date_end', '>=', $getBookDetail->date_create)
            ->first();
            DB::table('promotions')
            ->where('id', $promotion->id)
            ->update(['quantity'=>($promotion->quantity - $getBookDetail->quantity)]);
        }
    }
}
