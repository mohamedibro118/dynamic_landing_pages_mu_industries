<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PharIo\Manifest\Email;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyprofiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->cascadeOnDelete();
            $table->string('mobile');
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('whats');
            $table->string('email');
            $table->string('address_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('massenger')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->char('country',2)->default('eg');
            $table->char('locale',2)->default('en');
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->longText('gallary')->nullable();
            $table->enum('cta_source',['company','admins'])->default('company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sitesittings');
    }
};
