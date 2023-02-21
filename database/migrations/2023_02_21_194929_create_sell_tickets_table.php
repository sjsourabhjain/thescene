<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->default(0)->index(); //UserId if user registered
            $table->integer("role_id")->default(0); //UserId if user registered
            $table->integer("category_id")->default(0)->index(); //Ticket category id
            $table->string("ticket_order_id", 50)->nullable();
            $table->string("event_name")->nullable();
            $table->string("event_datetime", 50)->nullable();
            $table->string("event_location")->nullable();
            $table->float('ticket_price')->nullable();
            $table->string("full_name")->nullable();
            $table->string("email")->nullable();
            $table->string("contact_no")->nullable();
            $table->string("account_holder_name")->nullable();
            $table->string("bank_name")->nullable();
            $table->bigInteger("account_number")->nullable();
            $table->string("swift_code")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_tickets');
    }
}
