<?php

namespace App\Repositories\ExchangeVoucher;

use App\Repositories\BaseRepository;
use App\Repositories\ExchangeVoucher\ExchangeVoucherRepositoryInterface;
use App\Models\ExchangeVoucher;

class ExchangeVoucherRepository extends BaseRepository implements ExchangeVoucherRepositoryInterface
{
    /**
     * The ExchangeVoucher instance
     *
     * @param ExchangeVoucher $exchangeVoucher [description]
     *
     * @return void
     */
    public function __construct(ExchangeVoucher $exchangeVoucher)
    {
        $this->model = $exchangeVoucher;
    }

    /**
     * Find a exchange_voucher
     *
     * @param int $id [id of voucher]
     *
     * @return voucher
     */
    public function findByIdVoucher($id)
    {
        $data['message'] = "";
        $data['list'] = $this->model->join('user', 'exchange_vouchers.id', '=', 'user.id')->where('voucher_id', $id)->get();
        if (count($data['list']) == config('constants.ZERO')) {
            $data['message'] = trans('voucher.message_null_user_register');
        }
        return $data;
    }
}
