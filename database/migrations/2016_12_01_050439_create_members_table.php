<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userid', 255);
            $table->string('password', 255);
            $table->rememberToken();
            $table->string('referid', 255)->nullable();
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('email', 255)->unique();
            $table->char('verified', 1)->default(0);
            $table->dateTime('signupdate');
            $table->string('ip', 255);
            $table->string('referringsite', 255);
            $table->dateTime('lastlogin')->nullable();
            $table->char('vacation', 1)->default(0);
            $table->dateTime('vacationdate');
            $table->decimal('commission', 9, 2);
            $table->char('admin', 1)->default(0);
            $table->unique('userid');
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
        Schema::dropIfExists('members');
    }
}
