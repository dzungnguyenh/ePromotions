<?php

namespace App\Repositories\Book;
 
interface BookRepositoryInterface
{
    /**
     * Create a new book
     *
     * @param array $inputs input
     *
     * @return book
     */
    public function create($inputs);
}
