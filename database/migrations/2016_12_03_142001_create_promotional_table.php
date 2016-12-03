<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('type', 12)->default('banner');
            $table->string('p_image', 255);
            $table->string('p_subject', 255);
            $table->longText('p_message');
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
        Schema::dropIfExists('promotional');
    }
}
