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
        Schema::create('menubar', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Module', 'Page', 'ExternalLink'])->nullable();
            $table->integer('display_order');
            $table->boolean('status')->default(0);  /*0 - Inactive // 1 - Active */
            $table->string('external_link')->nullable();
            $table->foreignId('module_id')->constrained('modules')->nullable();
            $table->foreignId('page_id')->constrained('pages')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('menubar', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menubar');
    }
};
