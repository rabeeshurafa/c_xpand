<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer__courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('volunteer_id')->unsigned()->nullable();
            $table->foreign('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
            $table->string('name');
            $table->string('institution');
            $table->enum('type', ['course', 'qulification']);
            $table->string('completion_date');
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
        Schema::dropIfExists('volunteer__courses');
    }
}
