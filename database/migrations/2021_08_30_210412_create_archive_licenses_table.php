<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiveLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('model_id')->nullable();
            $table->string('model_name')->nullable();
            $table->string('licNo')->nullable();
            $table->string('licn')->nullable();
            $table->string('licnfile')->nullable();
            $table->string('type')->nullable();  
            $table->string('license_type')->nullable();
            $table->string('url')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('license_id')->unsigned()->nullable();
            $table->foreign('license_id')->references('id')->on('license_types')->onDelete('cascade');
            $table->integer('attachment_id')->unsigned()->nullable();
            $table->foreign('attachment_id')->references('id')->on('attachment_types')->onDelete('cascade');
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
        Schema::dropIfExists('archive_licenses');
    }
}
