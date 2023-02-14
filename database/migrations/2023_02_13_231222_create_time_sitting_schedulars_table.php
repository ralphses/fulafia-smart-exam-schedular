<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sitting_schedulars', function (Blueprint $table) {
            $table->id();

            $table->string('time_slot');
            $table->text('students');

            $table->unsignedBigInteger('venue_sitting_schedular_id');

            $table->foreign('venue_sitting_schedular_id')->references('id')->on('venue_sitting_schedulars')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('time_sitting_schedulars');
    }
};
