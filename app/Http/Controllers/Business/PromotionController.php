<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Promotion\PromotionRepository;
use App\Http\Requests\CreatePromotionRequest;
use Session;
use DB;

class PromotionController extends Controller
{
    /**
     * The PromotionRepository instance
     *
     * @param PromotionRepository
     */
    protected $promotion;
 
    /**
     * PromotionController constructor.
     *
     * @param App\Repositories\Promotion\PromotionRepository $promotion description
     */
    public function __construct(PromotionRepository $promotion)
    {
        $this->promotion= $promotion;
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
    * @param string $attribute Name field table.
    * @param string $id        Value of field table.
    * @param int    $limit     Number of item.
    *
    * @return mixed
    */
    public function showBy($attribute, $id, $limit = 5)
    {
        $promotions = $this->promotion->findBy($attribute, $id, $limit);
        return view('promotion.list', compact('promotions', 'id'));
    }

    /**
     * Display a form of the resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function addPromotion($id)
    {
        return view('promotion.create', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.create');
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
        $promotion = $request->only('title', 'description', 'percent', 'quantity', 'date_start', 'date_end', 'product_id');
        $productId = $request->input('product_id');
        $this->promotion->create($promotion);
        Session::flash('message', trans('promotion.create_promotion_successful'));
        return redirect()->route('show_promotion', ['attribute'=>'product_id', 'id'=> $productId]);
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
     * @param \Illuminate\Http\Request $request description
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePromotionRequest $request, $id)
    {
        $promotion = $request->only('title', 'description', 'percent', 'quantity', 'date_start', 'date_end');
        $productId = $request->input('product_id');
        $this->promotion->update($promotion, $id);
        Session::flash('message', trans('promotion.update_promotion_successful'));
        return redirect()->route('show_promotion', ['attribute'=>'product_id', 'id'=> $productId]);
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
        $val=$request->get('active');
        $id = $request->input('product_id');
        $time=date(config('date.format_timestamps'), time());
        if ($val == config('constants.ONE')) {
            $promotions = $this->promotion->filterByTime($id, '<', '<', $time);
        } elseif ($val == config('constants.TWO')) {
            $promotions = $this->promotion->filterByTime($id, '<', '>', $time);
        } else {
            $promotions = $this->promotion->filterByTime($id, '>', '>', $time);
        }
        return view('promotion.list', compact('promotions', 'id'));
    }
}
