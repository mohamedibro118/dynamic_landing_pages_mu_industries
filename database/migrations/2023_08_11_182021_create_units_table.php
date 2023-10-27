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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
           $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->string('identifier')->nullable();
            $table->string('img_url')->nullable();
            $table->string('price')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('surface')->nullable();
            $table->string('description',1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
