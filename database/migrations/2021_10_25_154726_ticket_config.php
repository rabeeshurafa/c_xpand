<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ticket_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_name');
            $table->integer('single_receive')->unsigned();
            $table->integer('emp_to_receive')->unsigned();
            $table->integer('time_to_close')->unsigned();
            $table->integer('single_close')->unsigned();
            $table->text('emp_to_close_json');
            $table->text('emp_to_revoke_json');
            $table->text('emp_to_update_json');
            $table->integer('display_print')->unsigned();
            $table->integer('edit_and_print')->unsigned();
            $table->integer('send_sms')->unsigned();
            $table->string('emp_to_reopen_ticket');
            $table->integer('show_receipt')->unsigned();
            $table->integer('receipt_is_need')->unsigned();
            $table->integer('has_attach')->unsigned();
            $table->string('attach_details_json');
            $table->integer('has_clearance')->unsigned();
            $table->integer('has_price_list')->unsigned();
            $table->string('price_list_json');
            $table->integer('apply_with_finished_license')->unsigned();
            $table->integer('apply_for_band_customer')->unsigned();
            $table->integer('public_app')->unsigned();
            $table->integer('fk_i_updated_by')->unsigned();
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
        Schema::dropIfExists('ticket_config');
    }
}
