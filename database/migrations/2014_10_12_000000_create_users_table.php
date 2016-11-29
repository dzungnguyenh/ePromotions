<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 255)->nullable();
            $table->string('password', 320)->nullable();
            $table->integer('gender', 1)->nullable();
            $table->date('dob')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('address', 320)->nullable();
            $table->string('avatar', 320)->nullable();
            $table->integer('point', 11)->nullable();
            $table->integer('role_id', 11)->nullable();
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
        Schema::drop('users');
    }
}
