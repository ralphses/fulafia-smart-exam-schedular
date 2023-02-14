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
        Schema::create('venue_sitting_schedulars', function (Blueprint $table) {
            $table->id();

            $table->string('venue_code');

            $table->unsignedBigInteger('sitting_schedular_id');

            $table->foreign('sitting_schedular_id')->references('id')->on('sitting_schedulars')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('venue_sitting_schedulars');
    }
};
