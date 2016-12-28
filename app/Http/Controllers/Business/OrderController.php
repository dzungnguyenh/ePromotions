<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepository;
use App\Repositories\BookDetail\BookDetailRepository;
use Auth;
use Session;

class OrderController extends Controller
{
    protected $bookRepository;
    protected $bookDetailRepository;

    /**
    * Initialized Instance
    *
    * @param BookRepository       $bookRepository       repo
    * @param BookDetailRepository $bookDetailRepository repo
    *
    * @return void
    */
    public function __construct(BookRepository $bookRepository, BookDetailRepository $bookDetailRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->bookDetailRepository = $bookDetailRepository;
    }

    /**
    * Method index
    *
    * @return view page
    */
    public function index()
    {
        $orders = $this->bookRepository->search($id = "", Auth::user()->id);
        return view('business.order', compact('orders'));
    }

    /**
    * Method Destroy book
    *
    * @param integer $id id of book_detail
    *
    * @return void
    */
    public function destroy($id)
    {
        $this->bookDetailRepository->delete($id);
        Session::flash('msg', trans('book.delete_order_successful'));
        return redirect()->back();
    }

    /**
    * Search order
    *
    * @param request $request request contain pattern to search
    *
    * @return redirect
    */
    public function search(Request $request)
    {
        $orders = $this->bookRepository->search($request->id, Auth::user()->id);
        return view('business.order', compact('orders'));
    }
}
