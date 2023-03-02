<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("order_id")->nullable();
            $table->bigInteger("user_id")->nullable();
            $table->bigInteger("event_id")->nullable();
            $table->bigInteger("amount")->nullable();
            $table->bigInteger("quantity")->nullable();
            $table->bigInteger("total")->nullable();
            $table->tinyInteger('payment_status')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
