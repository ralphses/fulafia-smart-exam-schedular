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
        Schema::create('exam_unit_schedules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('exam_units_id');
            $table->unsignedBigInteger('course_id');

            $table->text('students');

            $table->foreign('exam_units_id')->references('id')->on('exam_units')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('exam_unit_schedules');
    }
};
