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
        Schema::create('exam_day', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->date('week_day');

            $table->unsignedBigInteger('time_table_id');

            $table->foreign('time_table_id')->references('id')->on('time_tables')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('exam_day');
    }
};
