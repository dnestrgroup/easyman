<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key, Auto Increment, UNSIGNED INTEGER
            $table->integer('chatroomno'); // Current message must be in this room number
            $table->integer('fromuserid'); // Id of user, who send message
            $table->string('messagedate', 32)->nullable(); // Date when message was send
            $table->text('messagetext'); // message long text
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
