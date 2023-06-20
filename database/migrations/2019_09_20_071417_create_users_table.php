<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key, Auto Increment, UNSIGNED INTEGER
            $table->string('email', 100); // Login of users
            $table->string('password', 100); // Password encrypted at Salt and MD5() algorithm
            $table->string('name', 100); // Users name in chat
            $table->string('avatar', 100); // Users "file.jgp" avatar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
