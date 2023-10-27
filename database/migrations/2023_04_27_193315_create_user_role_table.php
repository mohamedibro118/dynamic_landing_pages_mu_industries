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
        Schema::create('user_role', function (Blueprint $table) {
            //authorizable_id   the id of the user
            //authrizable_type is the type of user
           $table->morphs('authorizable');
           $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
           $table->primary(['authorizable_id','authorizable_type','role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};
