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
        Schema::create('sitting_schedulars', function (Blueprint $table) {
            $table->id();

            $table->string('date');

            $table->unsignedBigInteger('time_tables_id');

            $table->foreign('time_tables_id')->references('id')->on('time_tables')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('sitting_schedulars');
    }
};
