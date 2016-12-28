<?php

namespace App\Repositories\Book;

use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepositoryInterface;
use App\Models\Book;

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
    * @param integer $id user_id in product table
    *
    * @return collection
    */
    public function getAllByBusiness($id)
    {
        return $this->model
        ->join('book_details', 'books.id', 'book_details.book_id')
        ->join('products', 'book_details.product_id', 'products.id')
        ->join('user', 'books.user_id', 'user.id')
        ->where('products.user_id', $id)
        ->select('*', 'book_details.id', 'book_details.quantity as book_quantity')
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
}
