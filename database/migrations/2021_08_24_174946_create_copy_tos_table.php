<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopyTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copy_tos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_id')->nullable();
            $table->string('name')->nullable();
            $table->string('model_name')->nullable();
            $table->integer('archive_id')->unsigned()->nullable();
            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade');
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
        Schema::dropIfExists('copy_tos');
    }
}
