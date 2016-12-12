<?php

namespace App\Http\Controllers\Bussiness;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Promotion\PromotionRepository;
use App\Http\Requests\CreatePromotionRequest;
use Session;

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
        $this->promotion->create($promotion);
        Session::flash('message', trans('promotion.create_promotion_successful'));
        return redirect()->route('promotions.index');
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
        $this->promotion->update($promotion, $id);
        Session::flash('message', trans('promotion.update_promotion_successful'));
        return redirect()->route('promotions.index');
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
        return redirect()->route('promotions.index');
    }
}
