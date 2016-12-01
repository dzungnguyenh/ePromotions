<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255)->nullable();
            $table->string('password', 100)->nullable();
            $table->integer('gender')->nullable()->length(1);
            $table->date('dob')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address', 320)->nullable();
            $table->string('avatar', 320)->nullable();
            $table->integer('point')->nullable();
            $table->integer('role_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
