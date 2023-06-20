<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key, Auto Increment, UNSIGNED INTEGER
            $table->integer('room_number'); // Unique room number [Digits]
            $table->string('room_key', 100); // Key to this room
            $table->string('room_name', 100)->nullable(); // Name of this room [Text]
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
