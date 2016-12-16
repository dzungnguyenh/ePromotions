<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeVoucher extends Model
{
    protected $table = 'exchange_vouchers';
    protected $fillable = ['user_id', 'voucher_id', 'status'];
}
