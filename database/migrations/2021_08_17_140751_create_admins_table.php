<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('identification')->nullable();
            $table->string('image')->nullable();
            $table->string('job_Number')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('InternalPhone')->nullable();
            $table->string('salary')->nullable();
            $table->string('currency')->nullable();
            $table->string('username')->nullable();
            $table->string('start_date')->nullable();
            $table->string('status')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('url')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('admins');
    }
}
