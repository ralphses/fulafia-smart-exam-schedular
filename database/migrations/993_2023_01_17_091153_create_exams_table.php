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
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('time_slot_id');
            $table->unsignedBigInteger('exam_day_id');

            $table->foreign('time_slot_id')->references('id')->on('time_slots')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('exam_day_id')->references('id')->on('exam_day')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
