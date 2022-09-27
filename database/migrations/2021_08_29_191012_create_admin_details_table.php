<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('job_title_id')->unsigned()->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');
            $table->integer('job_type_id')->unsigned()->nullable();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->string('year')->nullable();
            $table->string('balance')->nullable();
            $table->string('emergency')->nullable();
                
        
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
        Schema::dropIfExists('admin_details');
    }
}
