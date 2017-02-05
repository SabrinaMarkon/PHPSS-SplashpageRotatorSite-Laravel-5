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
            $table->string('userid', 255)->default('');
            $table->string('password', 255)->default('');
            $table->rememberToken();
            $table->string('referid', 255)->nullable();
            $table->string('firstname', 255)->default('');
            $table->string('lastname', 255)->default('');
            $table->string('email', 255)->unique();
            $table->char('verified', 1)->default(0);
            $table->dateTime('signupdate')->nullable();
            $table->string('ip', 255)->default('');
            $table->string('referringsite', 255)->default('');
            $table->dateTime('lastlogin')->nullable();
            $table->char('vacation', 1)->default(0);
            $table->dateTime('vacationdate')->nullable();
            $table->decimal('commission', 9, 2)->default(0.00);
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
