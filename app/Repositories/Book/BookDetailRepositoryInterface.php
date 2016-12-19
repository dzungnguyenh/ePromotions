<?php

namespace App\Repositories\Book;
 
interface BookDetailRepositoryInterface
{
    /**
     * Create a new book detail
     *
     * @param array $inputs input
     *
     * @return book detail
     */
    public function create($inputs);
}
