<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareProductsTable extends Migration
{

    public function up()
    {
        Schema::create('share_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('share_products');
    }
}
