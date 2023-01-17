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
        Schema::create('exam_units', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('exam_center_id');
            $table->unsignedBigInteger('exams_id');

            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('exam_center_id')->references('id')->on('exam_centers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('exams_id')->references('id')->on('exams')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('exam_units');
    }
};
