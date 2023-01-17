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
        Schema::create('schools', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('name');
            $table->string('email')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('logo')->default('/media/avatars/avatar5.jpg');

            $table->boolean('active')->default(true);

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('schools');
    }
};
