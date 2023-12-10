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
        Schema::create('student_images', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 255);
            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->onDelete('cascade'); // Adding the onDelete cascade option
            $table->longText('data_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_images');
    }
};
