<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_archives', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject')->nullable();
            $table->string('users')->nullable();
            $table->text('decision')->nullable();
            $table->integer('agenda_detail_id')->unsigned()->nullable();
            $table->foreign('agenda_detail_id')->references('id')->on('agenda_details')->onDelete('cascade');
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
        Schema::dropIfExists('agenda_archives');
    }
}
