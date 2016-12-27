<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookDetail\BookDetailRepository;

class BookDetailController extends Controller
{
    /**
     * The BookDetailRepository instance
     *
     * @param BookDetailRepository
     */
    protected $bookDetail;
 
    /**
     * BookDetailController constructor.
     *
     * @param App\Repositories\Book\BookDetailRepository $bookDetail description
     */
    public function __construct(BookDetailRepository $bookDetail)
    {
        $this->bookDetail= $bookDetail;
    }

    /**
     * Display the specified resource.
     *
     * @return mixed
     */
    public function showList()
    {
        $listOrders = $this->bookDetail->showList();
        return view('user.order.index', compact('listOrders'));
    }
}
