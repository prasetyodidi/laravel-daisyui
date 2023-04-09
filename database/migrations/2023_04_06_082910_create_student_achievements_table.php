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
        Schema::create('student_achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('achievements_id');
            $table->uuid('reported_by');
            $table->dateTime('achieved_at');
            $table->timestamps();

            $table->foreign('achievements_id')->references('id')->on('achievements');
            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('reported_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_achievements');
    }
};
