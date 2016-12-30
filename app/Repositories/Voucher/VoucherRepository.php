<?php

namespace App\Repositories\Voucher;

use App\Repositories\BaseRepository;
use App\Repositories\Voucher\VoucherRepositoryInterface;
use App\Models\Voucher;
use Auth;

class VoucherRepository extends BaseRepository implements VoucherRepositoryInterface
{
    /**
     * The Voucher instance
     *
     * @param Voucher $voucher [description]
     *
     * @return void
     */
    public function __construct(Voucher $voucher)
    {
        $this->model = $voucher;
    }

    /**
     * List voucher where point
     *
     * @return mixed
     */
    public function listVouchers()
    {
        return $this->model->where('point', '<=', Auth::user()->point)->get();
    }
}
