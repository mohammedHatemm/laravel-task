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
        //
        Schema::create('tracks_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('course_id');
            $table->unsignedBiginteger('track_id');

            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
            $table->foreign('track_id')->references('id')->on('tracks')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tracks_courses');


    }
};
