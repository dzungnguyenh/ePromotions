<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Voucher\VoucherRepository;
use App\Repositories\ExchangeVoucher\ExchangeVoucherRepository;
use App\Repositories\User\UserRepository;
use Auth;

class VoucherController extends Controller
{
    /**
     * The VoucherRepository instance
     *
     * @var voucherRepository
     */
    protected $voucherRepository;

    /**
     * The ExchangeVoucherRepository instance
     *
     * @var exVoucherRepository
     */
    protected $exVoucherRepository;

    /**
     * The UserRepository instance
     *
     * @var userRepository
     */
    protected $userRepository;

    /**
    * Create a new controller instance.
    *
    * @param VoucherRepository         $voucherRepository   [description]
    * @param ExchangeVoucherRepository $exVoucherRepository [description]
    * @param UserRepository            $userRepository      [description]
    */
    public function __construct(VoucherRepository $voucherRepository, ExchangeVoucherRepository $exVoucherRepository, UserRepository $userRepository)
    {
        $this->voucherRepository = $voucherRepository;
        $this->exVoucherRepository = $exVoucherRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Handle register voucher of user
     *
     * @param int $voucherId [description]
     *
     * @return response
     */
    public function handledRegisterVoucher($voucherId)
    {
        $this->exVoucherRepository->registerVoucher($voucherId);
        $voucher = $this->voucherRepository->find($voucherId);
        $exchangeVoucher = $this->exVoucherRepository->listVouchersUser();
        $newPoint = Auth::user()->point - $voucher->point;
        $this->userRepository->updatePoint($newPoint);
        return response()->json(['newPoint' => $newPoint, 'exchangeVoucher' => $exchangeVoucher->last()]);
    }

    /**
     * Handle delete exchange voucher of user
     *
     * @param int $exchangeVoucherId [description]
     *
     * @return null
     */
    public function handledDelVoucher($exchangeVoucherId)
    {
        $this->exVoucherRepository->delete($exchangeVoucherId);
        return null;
    }
}
