<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\Point\PointRepository;
use App\Http\Requests\CreatePointRequest;


class PointController extends Controller
{
	protected $pointRepository;

    public function __construct(PointRepository $pointRepository)
    {
    	$this->pointRepository = $pointRepository;
    }

    public function index()
    {	
    	$points = $this->pointRepository->all();
    	return view('admin.point.index', compact('points'));
    }

    public function create()
    {
    	return view('admin.point.create');
    }

    public function store(CreatePointRequest $request)
    {
    	$input = $request->only('vote', 'share', 'book');
    	$point = $this->pointRepository->create($input);
        Session::flash('msg', trans('point.create_point_successful'));
        return redirect(route('point.index'));
    }
}
