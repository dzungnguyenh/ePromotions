<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookDetail\BookDetailRepository;
use Session;

class BookDetailController extends Controller
{
    protected $bookDetailRepository;

    /**
    * Instrance product
    *
    * @param BookDetailRepository $bookDetailRepository bookDetail
    *
    * @return void
    */
    public function __construct(BookDetailRepository $bookDetailRepository)
    {
        $this->bookDetailRepository = $bookDetailRepository;
        $this->middleware('business');
    }

    /**
    * Accept order successfull by Ajax
    *
    * @param integer $id id of book_detail
    *
    * @return string
    */
    public function handleAcceptBook($id)
    {
        if ($this->bookDetailRepository->acceptBookAjax($id)) {
            Session::flash('msg', trans('order.accept_order_successfull'));
            return 'true';
        } else {
            return 'false';
        }
    }
}
