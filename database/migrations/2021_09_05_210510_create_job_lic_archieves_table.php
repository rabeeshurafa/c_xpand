<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobLicArchievesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_lic_archieves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('model_id')->nullable();
            $table->string('model_name')->nullable();
            $table->string('url')->nullable();
            $table->string('region')->nullable();
            $table->string('license_number')->nullable();
            $table->string('trade_name')->nullable();
            $table->string('start_date')->nullable();
            $table->string('expiry_ate')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('craft_type_id')->unsigned()->nullable();
            $table->foreign('craft_type_id')->references('id')->on('craft_types')->onDelete('cascade');
            $table->integer('limit_number_id')->unsigned()->nullable();
            $table->foreign('limit_number_id')->references('id')->on('limit_numbers')->onDelete('cascade');
            $table->integer('attachment_id')->unsigned()->nullable();
            $table->foreign('attachment_id')->references('id')->on('attachment_types')->onDelete('cascade');
            $table->integer('license_rating_id')->unsigned()->nullable();
            $table->foreign('license_rating_id')->references('id')->on('license_ratings')->onDelete('cascade');
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
        Schema::dropIfExists('job_lic_archieves');
    }
}
