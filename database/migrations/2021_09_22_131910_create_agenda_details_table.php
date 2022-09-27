<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agenda_number')->nullable();
            $table->string('agenda_date')->nullable();
            $table->integer('agenda_extention_id')->unsigned()->nullable();
            $table->foreign('agenda_extention_id')->references('id')->on('agenda_extentions')->onDelete('cascade');
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
        Schema::dropIfExists('agenda_details');
    }
}
