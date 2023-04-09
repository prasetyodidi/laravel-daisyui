<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achievement_types_id');
            $table->string('achievement_name');
            $table->unsignedInteger('achievement_point');
            $table->timestamps();

            $table->foreign('achievement_types_id')->references('id')->on('achievement_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
