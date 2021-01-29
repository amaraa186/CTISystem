<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_masters', function (Blueprint $table) {
            $table->id();
            $table->string('transition_number')->nullable();
            $table->integer('patient_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->integer('bed_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->datetime('entry_date')->nullable();
            $table->datetime('leave_date')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted')->nullable()->default(0);
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
        Schema::dropIfExists('patient_masters');
    }
}
