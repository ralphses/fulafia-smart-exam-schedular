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
        Schema::create('courses', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('department_id');

            $table->string('title');
            $table->string('code');
            $table->string('level');
            $table->string('semester');

            $table->integer('unit');

            $table->boolean('active')->default(true);
            $table->boolean('assigned')->default(false);
            $table->boolean('general')->default(false);

            $table->foreign('department_id')->references('id')->on('departments')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('courses');
    }
};
