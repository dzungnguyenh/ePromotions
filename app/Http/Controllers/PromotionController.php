<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Promotion;
use Validator;

class PromotionController extends Controller
{
    /**
     * Display all promotions of the all bussiness.
     *
     * @return Response
     */
    public function index()
    {
        $data = Promotion::all();
        return view('promotion.list', ['data' => $data]);
    }

    /**
     * Display form add promotion.
     *
     * @return Response
     */
    public function create()
    {
        return view('promotion.create');
    }

    /**
     * Store a promotion is created into promotions table.
     *
     * @param Request $request Validate value input
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
                    'title' => 'required|unique:promotions,title',
                    'description' => 'required',
                    'percent' => 'required',
                    'quantity' => 'required',
                    'start-date' => 'required',
                    'end-date' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        } else {
            $data = new Promotion;
            $data->title = $request->input('title');
            $data->description = $request->input('description');
            $data->percent = $request->input('percent');
            $data->quantity = $request->input('quantity');
            $data->date_start = $request->input('start-date');
            $data->date_end = $request->input('end-date');
            $data->product_id = $request->input('product-id');
            $data->save();
            return redirect()->route('list');
        }
    }

    /**
     * Display form edit a promotion selected.
     *
     * @param Int $id Get value input
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['promotion'] = Promotion::findOrFail($id);
        return view('promotion.edit')->with($data);
    }

    /**
     * Update promotion is selected.
     *
     * @param Request $request Get value input
     * @param Int     $id      Get value id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
                    'title' => 'required',
                    'description' => 'required',
                    'percent' => 'required',
                    'quantity' => 'required',
                    'start-date' => 'required',
                    'end-date' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        } else {
            DB::table('promotions')->where('id', $id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'percent' => $request->input('percent'),
                'quantity' => $request->input('quantity'),
                'date_start' => $request->input('start-date'),
                'date_end' => $request->input('end-date'),
            ]);
            return redirect()->route('list');
        }
    }

    /**
     * Delete promotion is selected.
     *
     * @param Int $id Get value id
     *
     * @return Response
     */
    public function delete($id)
    {
        DB::table('promotions')->where('id', $id)->delete();
        return redirect()->route('list');
    }
}
