<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\Point\PointRepository;
use App\Http\Requests\CreatePointRequest;

class PointController extends Controller
{

    /**
     * [The PointRepository instance]
     *
     * @param [PointRepository]
     */
    protected $pointRepository;

    /**
     * [Create a new PointRepository instance]
     *
     * @param PointRepository $pointRepository [description]
     *
     * @return void
     */
    public function __construct(PointRepository $pointRepository)
    {
        $this->pointRepository = $pointRepository;
    }

    /**
     * [Display a listing of the resource]
     *
     * @return [Response]
     */
    public function index()
    {
        $points = $this->pointRepository->all();

        return view('admin.point.index', compact('points'));
    }

    /**
     * [Show the form for creating a new resource]
     *
     * @return [Response]
     */
    public function create()
    {
        return view('admin.point.create');
    }

    /**
     * [Store a newly created resource in storage]
     *
     * @param CreatePointRequest $request [validate values input]
     *
     * @return [Response]
     */
    public function store(CreatePointRequest $request)
    {
        $input = $request->only('vote', 'share', 'book');
        $this->pointRepository->create($input);

        Session::flash('msg', trans('point.create_point_successful'));

        return redirect(route('point.index'));
    }
}
