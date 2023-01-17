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
        Schema::create('exam_centers', function (Blueprint $table) {

            $table->id();

            $table->string('code');
            $table->string('name');

            $table->unsignedInteger('capacity');

            $table->boolean('active')->default(true);

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
    public function down()
    {
        Schema::dropIfExists('exam_centers');
    }
};
