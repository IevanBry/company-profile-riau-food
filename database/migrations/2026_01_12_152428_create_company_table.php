<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('description_1');
            $table->text('description_2');
            $table->text('description_3');
            $table->string('years_established')->default('10+');
            $table->string('total_products')->default('50+');
            $table->string('original_guarantee')->default('100%');
            $table->text('vision');
            $table->string('mission_1');
            $table->string('mission_2');
            $table->string('mission_3');
            $table->string('mission_4');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->text('map_url')->nullable();
            $table->string('operating_hours')->default('08:30 - 17:00 WIB');
            $table->string('holiday_status')->default('Tutup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};