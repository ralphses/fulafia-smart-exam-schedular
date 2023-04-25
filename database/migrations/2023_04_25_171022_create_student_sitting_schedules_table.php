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
        Schema::create('student_sitting_schedules', function (Blueprint $table) {
            
            $table->id();

            $table->string('course_code');
            $table->string('venue');
            $table->string('time_slot');
            $table->string('exam_date');
            $table->string('student_matric');

            $table->unsignedBigInteger('seat_no')->nullable(true);
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
        Schema::dropIfExists('student_sitting_schedules');
    }
};
