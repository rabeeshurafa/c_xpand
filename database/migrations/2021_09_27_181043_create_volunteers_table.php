<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('identification')->nullable();
            $table->string('image')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('status')->nullable();
            $table->string('email')->unique();
            $table->string('url')->nullable();
            
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->string('marital_status')->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('job_title_id')->unsigned()->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('license_types_id')->unsigned()->nullable();
            $table->foreign('license_types_id')->references('id')->on('license_types')->onDelete('cascade');
            $table->string('birthdate')->nullable();
            $table->string('blood_type');

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
        Schema::dropIfExists('volunteers');
    }
}
