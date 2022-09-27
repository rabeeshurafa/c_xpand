<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('logo')->nullable();
                $table->string('image')->nullable();
                $table->string('phone_one')->nullable();
                $table->string('phone_two')->nullable();
                $table->string('email')->nullable();
                $table->string('fax')->nullable();
                $table->string('website')->nullable();
                $table->string('storage_path')->nullable();
                $table->string('max_upload')->nullable();
                $table->string('WorkinghoursFrom')->nullable();
                $table->string('WorkinghoursTo')->nullable();
                $table->string('Holidays')->nullable();

                $table->string('from1')->nullable();
                $table->string('to1')->nullable();
                $table->string('from2')->nullable();
                $table->string('to2')->nullable(); 
               $table->string('from3')->nullable();
                $table->string('to3')->nullable();                
                $table->string('from4')->nullable();
                $table->string('to4')->nullable();                
                $table->string('from5')->nullable();
                $table->string('to5')->nullable();                
                $table->string('from6')->nullable();
                $table->string('to6')->nullable();                
                $table->string('from7')->nullable();
                $table->string('to7')->nullable();
                
                
                $table->integer('address_id')->unsigned()->nullable();
                $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('settings');
    }
}
