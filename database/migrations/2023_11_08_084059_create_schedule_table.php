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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->string('date_ad')->nullable();
            $table->string('date_bs')->nullable();
            $table->string('day')->nullable();
            $table->boolean('status')->default(0);  /*0 - nothing // 1 - booked */
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->foreignId('doctors_id')->constrained('doctors')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};
