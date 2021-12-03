<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('nim', 10)->unique();
            $table->string('username')->unique();
            $table->string('password');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
