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
        Schema::create('time_tables', function (Blueprint $table) {

            $table->id();

            $table->date('start_date');
            $table->date('stop_date');

            $table->string('exam_days');
            $table->string('session', 20);
            $table->string('school_name');
            $table->string('filePath')->nullable(true);
            $table->string('instructions', 500);

            $table->unsignedBigInteger('school_id');

            $table->foreign('school_id')->references('id')->on('schools')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('time_tables');
    }
};
