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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('student_email')->unique();
            $table->string('student_lname');
            $table->string('student_fname');
            $table->string('student_course');
            $table->integer('student_yr');
            $table->string('student_section');
            $table->binary('student_blob1')->nullable();
            $table->binary('student_blob2')->nullable();
            $table->binary('student_blob3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
