<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->string('nim', 10)->unique();
            $table->string('nama');
            $table->string('tempatLahir');
            $table->timestamp('tanggalLahir');
            $table->binary('gender');
            $table->string('profilePhoto');
            $table->string('email')->unique();
            $table->binary('matched');
            $table->string('matchedNim', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
