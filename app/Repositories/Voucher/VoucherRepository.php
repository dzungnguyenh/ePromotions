<?php

namespace App\Repositories\Voucher;

use App\Repositories\BaseRepository;
use App\Repositories\Voucher\VoucherRepositoryInterface;
use App\Models\Voucher;

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
}
