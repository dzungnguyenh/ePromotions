<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Session;

class CategoryController extends Controller
{

    protected $categoryRepository;

    /**
     * Constructor for category controller
     *
     * @param CategoryRepository $categoryRepository [description]
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->categoryRepository->allRoot();
        return view('admin.category.index', compact('list', $list));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = $this->categoryRepository->allName();
        return view('admin.category.create', compact('list', $list));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->only('name', 'parent_id');
        $this->categoryRepository->create($input);
        $list = $this->categoryRepository->allRoot();
        Session::flash('msg', trans('category.CREATE_CATEGORY_SUCCESSFULL'));
        return view('admin.category.index', compact('list', $list));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listDescentants = $this->categoryRepository->findDescendants($id);
        $list = $this->categoryRepository->allRoot();
        return view('admin.category.index', compact('listDescentants', 'list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        $list = $this->categoryRepository->allName();
        return view('admin.category.edit', compact('category', 'list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param int                      $id      Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $input = $request->only('name', 'parent_id');
        $this->categoryRepository->update($input, $id);
        $list = $this->categoryRepository->allRoot();
        Session::flash('msg', trans('category.UPDATE_CATEGORY_SUCCESSFULL'));
        return view('admin.category.index', compact('list', $list));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id Integer
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        Session::flash('msg', trans('category.DELETE_CATEGORY_SUCCESSFULL'));
        return redirect()->back();
    }
}
