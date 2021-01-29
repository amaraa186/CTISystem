<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('kana')->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned()->nullable()->default(2);
            $table->integer('deleted')->nullable()->default(0);
            $table->rememberToken();
            $table->integer('Created_by')->unsigned()->nullable();
            $table->integer('Updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('users');
    }
}
