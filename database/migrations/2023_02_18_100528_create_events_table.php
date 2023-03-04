<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer("event_organizer_id")->default(2)->index();
            $table->integer("category_id")->default(0)->index();
            $table->integer("type");
            $table->integer("vip_seat")->default(0)->index();
            $table->integer("general_seat")->default(0)->index();
            $table->float("general_seat_price",8,2)->nullable();
            $table->float("vip_seat_price",8,2)->nullable();
            $table->float("commission",8,2)->nullable();
            $table->float("affiliate_commission",8,2)->nullable();
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->string("image")->nullable();
            $table->string("location")->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string("start_datetime", 50)->nullable();
            $table->string("end_datetime", 50)->nullable();
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
        Schema::dropIfExists('events');
    }
}
