<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookDetail\BookDetailRepository;
use DB;

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
    /**
     * [delete book and book detail at user delete order]
     *
     * @param [type] $id [id book]
     *
     * @return [type]     [url]
     */
    public function delete($id)
    {
        $bookDetail=DB::table('book_details')
        ->where('id', '=', $id)
        ->select('status', 'book_id')
        ->first();
        if (is_null($bookDetail)) {
            return $this->showList();
        }
        if ($bookDetail->status == config('constants.status_zero')) {
            DB::table('books')
            ->delete($bookDetail->book_id);
        }
        return $this->showList();
    }
}
