<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepository;
use App\Repositories\BookDetail\BookDetailRepository;
use App\Repositories\Category\CategoryRepository;
use App\Models\Product;
use Session;

class BookController extends Controller
{
    /**
     * The BookRepository instance
     *
     * @param BookRepository
     */
    protected $book;

    /**
     * The BookDetailRepository instance
     *
     * @param BookDetailRepository
     */
    protected $bookDetail;

    /**
     * The CategoryRepository instance
     *
     * @var CategoryRepository
     */
    protected $categoryRepository;
 
    /**
     * BookController constructor.
     *
     * @param App\Repositories\Book\BookRepository         $book               description
     * @param App\Repositories\Book\BookDetailRepository   $bookDetail         description
     * @param App\Repositories\Category\CategoryRepository $categoryRepository description
     */
    public function __construct(BookRepository $book, BookDetailRepository $bookDetail, CategoryRepository $categoryRepository)
    {
        $this->book= $book;
        $this->bookDetail= $bookDetail;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Input value
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = $request->only('user_id');
        $bookId=$this->book->create($book)->id;
        $request['book_id'] = $bookId;
        $bookDetail = $request->only('quantity', 'book_id', 'price', 'product_id', 'status');
        $this->bookDetail->create($bookDetail);
        Session::flash('message', trans('book.booking_successful'));
        return redirect()->back()->with('bookId', $bookId);
    }

    /**
     * Display the specified resource.
     *
     * @param int $productId Product id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $categories = $this->categoryRepository->allRoot();
        foreach ($categories as $key => $category) {
            $childs[$key] = $this->categoryRepository->findDescendants($category->id);
        }
        $product=Product::where('id', $productId)->get();
        if ($product->isEmpty()) {
            return view('errors.book.error_book', ['categories'=> $categories, 'childs' => $childs]);
        } else {
            return view('book.book', ['product' => $product,'categories'=> $categories, 'childs' => $childs]);
        }
    }
}
