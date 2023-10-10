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
            $table->int('contact');
            $table->string('department');
            $table->string('photo');
            $table->string('province');
            $table->string('district');
            $table->string('municipality');
            $table->string('ward');
            $table->string('tole');
            $table->enum('gender',['Male', 'Female', 'Others']);
            $table->date('birthday');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
