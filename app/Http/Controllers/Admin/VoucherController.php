<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Repositories\Voucher\VoucherRepository;
use App\Repositories\ExchangeVoucher\ExchangeVoucherRepository;
use App\Http\Requests\CreateVoucherRequest;

class VoucherController extends Controller
{

    /**
     * The VoucherRepository instance
     *
     * @param VoucherRepository
     */
    protected $voucherRepository;

    /**
     * Create a new VoucherRepository,ExchangeVoucherRepository instance
     *
     * @param VoucherRepository         $voucherRepository   description
     * @param ExchangeVoucherRepository         $exVoucherRepository   description
     *
     * @return void
     */
    public function __construct(VoucherRepository $voucherRepository, ExchangeVoucherRepository $exVoucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
        $this->exVoucherRepository = $exVoucherRepository;
    }

    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
        $vouchers = $this->voucherRepository->all();
        return view('admin.voucher.index', compact('vouchers'));
    }

    /**
     * [Show the form for creating a new resource]
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage
     *
     * @param CreateVoucherRequest $request [validate values input]
     *
     * @return Response
     */
    public function store(CreateVoucherRequest $request)
    {
        $input = $request->only('name', 'point', 'value');
        $this->voucherRepository->create($input);

        Session::flash('msg', trans('voucher.create_voucher_successful'));

        return redirect(route('voucher.index'));
    }

    /**
     * Delete a voucher
     *
     * @param int $id [id of voucher]
     *
     * @return Reponse
     */
    public function destroy($id)
    {
        $voucher = $this->voucherRepository->find($id);
        if (empty($voucher)) {
            Session::flash('msg', trans('voucher.voucher_not_found'));
            return redirect(route('voucher.index'));
        }
        $this->voucherRepository->delete($id);
        Session::flash('msg', trans('voucher.delete_voucher_successfully'));
        return redirect(route('voucher.index'));
    }

    /**
     * Edit a voucher
     *
     * @param int $id [id of voucher]
     *
     * @return Reponse
     */
    public function edit($id)
    {
        $voucher = $this->voucherRepository->find($id);
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update a voucher
     *
     * @param CreateVoucherRequest $request [validate values input]
     * @param int                  $id      [id of voucher]
     *
     * @return Reponse
     */
    public function update(CreateVoucherRequest $request, $id)
    {
        $voucher = $this->voucherRepository->find($id);
        if (empty($voucher)) {
            Session::flash('msg', trans('voucher.voucher_not_found'));
            return redirect(route('voucher.index'));
        }
        $inputs = $request->only('name', 'point', 'value');
        $voucher = $this->voucherRepository->update($inputs, $id);
        Session::flash('msg', trans('voucher.update_voucher_successfully'));
        return redirect(route('voucher.index'));
    }

    /**
     * Show a voucher
     *
     * @param int $id [id of voucher]
     *
     * @return Reponse
     */
    public function show($id)
    {
        $voucher = $this->voucherRepository->find($id);
        $exchangeVoucher = $this->exVoucherRepository->findByIdVoucher($id);
        return view('admin.voucher.show', compact('voucher', 'exchangeVoucher'));
    }
}
