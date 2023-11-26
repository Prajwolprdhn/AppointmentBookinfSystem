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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('book_date_bs');
            $table->string('book_date_ad');
            $table->string('remarks')->nullable();
            $table->foreignId('schedule_id')->constrained('schedule');
            $table->foreignId('patient_id')->constrained('patient');
            $table->foreignId('doctors_id')->constrained('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
