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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lisence_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('photo')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('municipality')->nullable();
            $table->string('ward')->nullable();
            $table->string('tole')->nullable();
            $table->enum('gender',['Male', 'Female', 'Others']);
            $table->string('nepali_date')->nullable();
            $table->string('english_date')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
