<?php

namespace App\Repositories\ExchangeVoucher;

interface ExchangeVoucherRepositoryInterface
{
    /**
     * Find a exchange_voucher
     *
     * @param int $id [id of exchange_voucher update]
     *
     * @return voucher
     */
    public function find($id);
}
