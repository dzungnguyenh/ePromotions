<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Business\BusinessRepository;

class BusinessController extends Controller
{
    /**
     * The businessRepository instance
     *
     * @var BusinessRepository
     */
    protected $businessRepository;

    /**
     * Create a new BusinessRepository instance
     *
     * @param BusinessRepository $businessRepository [description]
     */
    public function __construct(BusinessRepository $businessRepository)
    {
        $this->businessRepository = $businessRepository;
    }

    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
        $sort = config('constants.NO');
        $role = config('constants.ROLEBUSSINESS');
        $businesses = $this->businessRepository->getBusiness($role);

        return view('admin.business.index', compact('businesses', 'sort'));
    }
}
