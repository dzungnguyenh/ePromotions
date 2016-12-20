<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Business\BusinessRepository;
use Session;

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

    /**
     * Show a business
     *
     * @param int $id [id of business]
     *
     * @return Reponse
     */
    public function show($id)
    {
        $business = $this->businessRepository->find($id);
        if (empty($business)) {
            Session::flash('msg', trans('business.business_not_found'));
            return redirect(route('business.index'));
        }
        return view('admin.business.show', compact('business'));
    }

    /**
     * Delete a business
     *
     * @param int $id [id of business]
     *
     * @return Reponse
     */
    public function destroy($id)
    {
        $business = $this->businessRepository->find($id);
        if (empty($business)) {
            Session::flash('msg', trans('business.business_not_found'));
            return redirect(route('business.index'));
        }
        $this->businessRepository->delete($id);
        Session::flash('msg', trans('business.delete_business_successfully'));
        return redirect(route('business.index'));
    }

    /**
     * Update a business when block
     *
     * @param int $id [id of business]
     *
     * @return boolean
     */
    public function update($id)
    {
        $business= $this->businessRepository->find($id);
        if (empty($business)) {
            Session::flash('msg', trans('business.business_not_found'));
        }
        $business = $this->businessRepository->blockBusiness($id);
    }
}
