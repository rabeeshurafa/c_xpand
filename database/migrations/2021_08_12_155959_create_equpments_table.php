<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEqupmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equpments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('internal_number')->nullable();
            $table->string('count')->nullable();
            $table->string('selling_date')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('currency')->nullable();
            $table->text('notes')->nullable();
            $table->text('address')->nullable();
            $table->string('wdate_input')->nullable();
            $table->string('supply_phone')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->integer('sponser')->unsigned();
            $table->string('url')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('sponser')->references('id')->on('orgnizations')->onDelete('cascade');
            $table->integer('supplyer')->unsigned();
            $table->foreign('supplyer')->references('id')->on('orgnizations')->onDelete('cascade');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('equpment_type_id')->unsigned();
            $table->foreign('equpment_type_id')->references('id')->on('equpment_types')->onDelete('cascade');
            $table->integer('equpment_status_id')->unsigned();
            $table->foreign('equpment_status_id')->references('id')->on('equpment_statuses')->onDelete('cascade');

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
        Schema::dropIfExists('equpments');
    }
}
