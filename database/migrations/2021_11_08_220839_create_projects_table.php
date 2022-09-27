<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('ProjectNo')->nullable();
            $table->string('dateStart')->nullable();
            $table->string('dateEnd')->nullable();
            $table->string('Projectcost')->nullable();
            $table->string('currency')->nullable();
            $table->string('cost1')->nullable();
            $table->string('pinc8')->nullable();
            $table->string('url')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('addresse_id')->unsigned();
            $table->foreign('addresse_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('sponser')->unsigned();
            $table->foreign('sponser')->references('id')->on('orgnizations')->onDelete('cascade');
            $table->integer('contract')->unsigned();
            $table->foreign('contract')->references('id')->on('orgnizations')->onDelete('cascade');
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
