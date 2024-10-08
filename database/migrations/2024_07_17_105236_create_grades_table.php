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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('student_code');
            $table->string('student_email');
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->string('student_fullname');
            $table->float('attendance_score');
            $table->float('midterm_score');
            $table->float('final_score');
            $table->float('average_of_subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
