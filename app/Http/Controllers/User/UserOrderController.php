<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepository;
use App\Repositories\BookDetail\BookDetailRepository;
use Session;

class UserOrderController extends Controller
{
    protected $bookRepository;
    protected $bookDetailRepository;
    /**
    * Instance UserOrderController
    *
    * @param BookDetailRepository $bookDetailRepository bookdetail
    * @param BookRepository       $bookRepository       book
    *
    * @return void
    */
    public function __construct(BookDetailRepository $bookDetailRepository, BookRepository $bookRepository)
    {
        $this->bookDetailRepository = $bookDetailRepository;
        $this->bookRepository = $bookRepository;
    }
    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $orders = $this->bookRepository->getAllByUser(4);
        // dd($orders);
        return view('user.order.index')->with(['orders'=>$orders]);
    }
    /**
    * Delete order
    *
    * @param integer $id id of order
    *
    * @return void
    */
    public function destroy($id)
    {
        $this->bookRepository->delete($id);
        Session::flash('msg', trans('delete_order_successfull'));
        return redirect()->route('userorder.index');
    }
}
