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
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('matric')->unique();
            $table->string('email')->unique();
            $table->string('level');
            $table->string('fees')->unique();

            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('department_id');

            $table->foreign('school_id')->references('id')->on('schools')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('faculty_id')->references('id')->on('faculties')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('students');
    }
};
