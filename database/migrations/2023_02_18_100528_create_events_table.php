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
            $table->integer("event_organizer_id")->default(0)->index();
            $table->integer("category_id")->default(0)->index();
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->string("image")->nullable();
            $table->string("tags")->nullable();
            $table->string("city", 100)->nullable();
            $table->string("location")->nullable();
            $table->string("link")->nullable();
            $table->string("start_datetime", 50)->nullable();
            $table->string("end_datetime", 50)->nullable();
            $table->string("time_zone", 50)->nullable();
            $table->string("language", 100)->nullable();
            $table->text("description")->nullable();
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
