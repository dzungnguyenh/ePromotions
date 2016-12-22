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

    /**
    * Method accept book successfull by Ajax
    *
    * @param integer $id id of book_detail
    *
    *@return string
    */
    public function acceptBookAjax($id)
    {
        $order = $this->find($id);
        //if order haven't accept then accept order
        if ($order->status == 0) {
            $order->update(['status' =>1]);
            return true;
        } else {
            return false;
        }
    }
}
