<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgnizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgnizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('zepe_code')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('whatsapp_one')->nullable();
            $table->string('whatsapp_two')->nullable();
            $table->string('email')->nullable();
            $table->string('org_type')->nullable(); // org type can be bank , supplyer ... and soon 
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('url')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('job_title_id')->unsigned()->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');
            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->integer('addresse_id')->unsigned();
            $table->foreign('addresse_id')->references('id')->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('orgnizations');
    }
}
