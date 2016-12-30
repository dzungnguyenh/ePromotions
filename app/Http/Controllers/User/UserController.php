<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Repositories\Voucher\VoucherRepository;
use App\Repositories\ExchangeVoucher\ExchangeVoucherRepository;
use App\Http\Requests\UpdateUserRequest;
use Session;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * The PointRepository instance
     *
     * @param PointRepository
     */
    protected $userRepository;

    /**
     * The VoucherRepository instance
     *
     * @param VoucherRepository
     */
    protected $voucherRepository;

    /**
     * The ExchangeVoucherRepository instance
     *
     * @param ExchangeVoucherRepository
     */
    protected $exchangeVoucherRepository;

    /**
     * Construct of UserController
     *
     * @param UserRepository            $userRepository            description
     * @param VoucherRepository         $voucherRepository         description
     * @param ExchangeVoucherRepository $exchangeVoucherRepository description
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository, VoucherRepository $voucherRepository, ExchangeVoucherRepository $exchangeVoucherRepository)
    {
        $this->userRepository = $userRepository;
        $this->voucherRepository = $voucherRepository;
        $this->exchangeVoucherRepository = $exchangeVoucherRepository;
    }

    /**
     * Display user information
     *
     * @return Reponse
     */
    public function index()
    {
        return view('user.profile.index');
    }

    /**
     * Edit a user information
     *
     * @param int $id [id of user]
     *
     * @return Reponse
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        return view('user.profile.edit', compact('user'));
    }

    /**
     * Update a user information
     *
     * @param UpdateUserRequest $request [validate text input]
     * @param int               $id      [id of user]
     *
     * @return Reponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Session::flash('msg', trans('user.user_not_found'));
            return redirect(route('admin.point.index'));
        }
        $input = $request->only('name', 'password', 'gender', 'dob', 'phone', 'address', 'avatar', 'point', 'role_id');
        if (!empty($request['old-password'])) {
            if (!Hash::check($request['old-password'], Auth::user()->password)) {
                return redirect()->back()->withErrors(trans('message.password_not_connecting'));
            }
        }
        $user = $this->userRepository->update($input, $id);
        Session::flash('msg', trans('user.update_user_successfully'));
        return redirect(route('user.index'));
    }

    /**
     * List voucher of user
     *
     * @return mixed
     */
    public function listVoucher()
    {
        $listVouchersUser = $this->exchangeVoucherRepository->listVouchersUser();
        $listVouchers = $this->voucherRepository->listVouchers();
        return view('user.voucher.index', compact('listVouchersUser', 'listVouchers'));
    }
}
