<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkExchangeVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exchange_vouchers', function (Blueprint $table) {
          $table->foreign('user_id')
              ->references('id')->on('user')
              ->onDelete('cascade');
          $table->foreign('voucher_id')
              ->references('id')->on('vouchers')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exchange_vouchers', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
          $table->dropForeign(['voucher_id']);
        });
    }
}
