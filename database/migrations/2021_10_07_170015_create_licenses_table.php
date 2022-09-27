<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('peiceNo')->nullable();
            $table->string('peiceNoTabo')->nullable();
            $table->integer('hodNo')->nullable();
            $table->double('licenseArea')->nullable();
            $table->integer('floorNo')->nullable();
            $table->date('license_date')->nullable();
            $table->double('allArea')->nullable();
            $table->string('building_desc')->nullable();
            $table->integer('licNo')->nullable();
            $table->integer('fileNo')->nullable();
            $table->integer('use_desc')->nullable();
            $table->string('notes')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');         
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
        Schema::dropIfExists('licenses');
    }
}
