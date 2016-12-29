<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Promotion\PromotionRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\User\UserRepository;
use App\Http\Requests\CreatePromotionRequest;
use Session;
use DB;
use Carbon\Carbon;

class PromotionController extends Controller
{
    /**
     * The PromotionRepository instance
     *
     * @param PromotionRepository
     */
    protected $promotion;

    /**
     * The CategoryRepository instance
     *
     * @var CategoryRepository
     */
    protected $category;

    /**
     * The ProductRepository instance
     *
     * @var ProductRepository
     */
    protected $product;

    /**
     * The UserRepository instance
     *
     * @var UserRepository
     */
    protected $user;
 
    /**
     * PromotionController constructor.
     *
     * @param App\Repositories\Promotion\PromotionRepository $promotion description
     * @param App\Repositories\Category\CategoryRepository   $category  description
     * @param App\Repositories\Product\ProductRepository     $product   description
     * @param App\Repositories\User\UserRepository           $user      description
     */
    public function __construct(PromotionRepository $promotion, CategoryRepository $category, ProductRepository $product, UserRepository $user)
    {
        $this->promotion= $promotion;
        $this->category= $category;
        $this->product= $product;
        $this->user= $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = $this->promotion->all();
        return view('promotion.list', compact('promotions'));
    }

    /**
    * [Return data match parameter]
    *
    * @param string $productId Value of field table.
    * @param int    $limit     Number of item.
    *
    * @return mixed
    */
    public function showBy($productId, $limit = 5)
    {
        $promotions = $this->promotion->findBy('product_id', $productId, $limit);
        return view('promotion.list', compact('promotions', 'productId'));
    }

    /**
     * Display a form of the resource.
     *
     * @param int $productId Product id
     *
     * @return \Illuminate\Http\Response
     */
    public function addPromotion($productId)
    {
        return view('promotion.create', compact('productId'));
    }

    /**
     * Show resource.
     *
     * @param int $promotionId Promotion id
     *
     * @return \Illuminate\Http\Response
     */
    public function showDetail($promotionId)
    {
        $categories = $this->category->allRoot();
        foreach ($categories as $key => $category) {
            $childs[$key] = $this->category->findDescendants($category->id);
        }
        $promotion= $this->promotion->find($promotionId);
        $productId= $promotion->product_id;
        $product= $this->product->find($productId);
        $userId = $product->user_id;
        $user= $this->user->find($userId);
        return view('promotion.detail', compact('categories', 'childs', 'promotion', 'productId', 'product', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request description
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePromotionRequest $request)
    {
        $dateStart= $request->input('date_start');
        $dateEnd= $request->input('date_end');
        $productId= $request->input('product_id');
        $errorDate = $this->promotion->getErrorStore($productId, $dateStart, $dateEnd);
        $errorDate = array_filter($errorDate);
        if (count($errorDate) != 0) {
            return redirect()->back()->withErrors(compact('errorDate'))->withInput();
        } else {
            $promotion = $request->only('title', 'description', 'percent', 'quantity', 'date_start', 'date_end', 'product_id');
            $promotion['image']= $this->promotion->uploadImage($request->file('image'), config('promotion.IMAGE_PATH'));
            $productId = $request->input('product_id');
            $this->promotion->create($promotion);
            Session::flash('message', trans('promotion.create_promotion_successful'));
            return redirect()->route('show_promotion', ['productId'=> $productId]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion=$this->promotion->find($id);
        return view('promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request     Description
     * @param int                      $promotionId Promotion id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePromotionRequest $request, $promotionId)
    {
        $dateStart= $request->input('date_start');
        $dateEnd= $request->input('date_end');
        $productId= $request->input('product_id');
        $errorDate = $this->promotion->getErrorUpdate($promotionId, $dateStart, $dateEnd);
        $errorDate = array_filter($errorDate);
        if (count($errorDate) != 0) {
            return redirect()->back()->withErrors(compact('errorDate'))->withInput();
        } else {
            $promotion = $request->only('title', 'description', 'percent', 'quantity', 'date_start', 'date_end');
            $promotion['image']= $this->promotion->uploadImage($request->file('image'), config('promotion.IMAGE_PATH'));
            $this->promotion->update($promotion, $promotionId);
            Session::flash('message', trans('promotion.update_promotion_successful'));
            return redirect()->route('show_promotion', ['productId'=> $productId]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id

     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->promotion->delete($id);
        Session::flash('message', trans('promotion.delete_promotion_successful'));
        return redirect()->back();
    }

    /**
     * Filter resource in storage.
     *
     * @param \Illuminate\Http\Request $request description
     *
     * @return \Illuminate\Http\Response
     */
    public function showByDate(Request $request)
    {
        $val=$request->get('promotion_status');
        $productId = $request->input('product_id');
        $time=$this->promotion->getTime();
        if ($val == config('promotion.EXPIRED')) {
            $promotions = $this->promotion->filterExpired($productId, $time);
        } elseif ($val == config('promotion.PRESENT')) {
            $promotions = $this->promotion->filterPresent($productId, $time);
        } elseif ($val == config('promotion.FUTURE')) {
            $promotions = $this->promotion->filterFuture($productId, $time);
        }
        return view('promotion.list', compact('promotions', 'productId'));
    }
}
