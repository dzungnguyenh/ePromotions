<?php

namespace App\Repositories\Book;

use App\Repositories\BaseRepository;
use App\Repositories\Book\BookDetailRepositoryInterface;
use App\Models\BookDetail;
 
class BookDetailRepository extends BaseRepository implements BookDetailRepositoryInterface
{
    /**
     * Book detail constructor.
     *
     * @param Book detail $model description
     *
     * @return void
     */
    public function __construct(BookDetail $model)
    {
        $this->model = $model;
    }
}
