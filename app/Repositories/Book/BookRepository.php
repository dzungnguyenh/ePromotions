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
}
