<?php

namespace App\Repositories\BookDetail;

use App\Repositories\BaseRepository;
use App\Repositories\BookDetail\BookDetailRepositoryInterface;
use App\Models\BookDetail;

class BookDetailRepository extends BaseRepository implements BookDetailRepositoryInterface
{

    /**
    * BookDetail instance
    *
    * @param BookDetail $bookdetail bookdetail
    *
    *@return void
    */
    public function __construct(BookDetail $bookdetail)
    {
        $this->model = $bookdetail;
    }
}
