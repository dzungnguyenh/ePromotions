<?php

namespace App\Repositories\Book;

use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepositoryInterface;
use App\Models\Book;
 
class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
     * Book constructor.
     *
     * @param Book $model description
     *
     * @return void
     */
    public function __construct(Book $model)
    {
        $this->model = $model;
    }
}
