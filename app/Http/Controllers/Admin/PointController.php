<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\Point\PointRepository;
use App\Http\Requests\CreatePointRequest;
use App\Http\Requests\UpdatePointRequest;

class PointController extends Controller
{

    /**
     * The PointRepository instance
     *
     * @param PointRepository
     */
    protected $pointRepository;

    /**
     * Create a new PointRepository instance
     *
     * @param PointRepository $pointRepository description
     *
     * @return void
     */
    public function __construct(PointRepository $pointRepository)
    {
        $this->pointRepository = $pointRepository;
    }

    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
        $points = $this->pointRepository->all();

        return view('admin.point.index', compact('points'));
    }

    /**
     * [Show the form for creating a new resource]
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.point.create');
    }

    /**
     * Store a newly created resource in storage
     *
     * @param CreatePointRequest $request [validate values input]
     *
     * @return Response
     */
    public function store(CreatePointRequest $request)
    {
        $input = $request->only('vote', 'share', 'book');
        $this->pointRepository->create($input);

        Session::flash('msg', trans('point.create_point_successful'));

        return redirect(route('point.index'));
    }

    /**
     * Show a point
     *
     * @param int $id [id of point]
     *
     * @return Reponse
     */
    public function show($id)
    {
        $point = $this->pointRepository->find($id);
        return view('admin.point.show', compact('point'));
    }

    /**
     * Edit a point
     *
     * @param int $id [id of point]
     *
     * @return Reponse
     */
    public function edit($id)
    {
        $point = $this->pointRepository->find($id);
        return view('admin.point.edit', compact('point'));
    }

    /**
     * Update a point
     *
     * @param UpdatePointRequest $request [validate values input]
     * @param int                $id      [id of point]
     *
     * @return Reponse
     */
    public function update(UpdatePointRequest $request, $id)
    {
        $point = $this->pointRepository->find($id);
        if (empty($point)) {
            Session::flash('msg', trans('point.point_not_found'));
            return redirect(route('point.index'));
        }
        $inputs = $request->only('vote', 'share', 'book');
        $point = $this->pointRepository->update($inputs, $id);
        Session::flash('msg', trans('point.update_point_successfully'));
        return redirect(route('point.index'));
    }

    /**
     * Delete a point
     *
     * @param int $id [id of point]
     *
     * @return Reponse
     */
    public function destroy($id)
    {
        $point = $this->pointRepository->find($id);
        if (empty($point)) {
            Session::flash('msg', trans('point.point_not_found'));
            return redirect(route('point.index'));
        }
        $this->pointRepository->delete($id);
        Session::flash('msg', trans('point.delete_point_successfully'));
        return redirect(route('point.index'));
    }
}
