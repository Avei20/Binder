<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchedListTable extends Migration
{
    public function up()
    {
        Schema::create('matched_list', function (Blueprint $table) {
            $table->id('id');
            $table->string('nimUser', 10);
            $table->string('nimMatched', 10);
            $table->timestamp('time');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matched_list');
    }
}
