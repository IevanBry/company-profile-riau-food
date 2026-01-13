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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_badge')->default('✨ Importir & Distributor Terpercaya');
            $table->string('hero_title')->default('Distributor Produk Berkualitas Terpercaya');
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            // Hero Stats
            $table->string('stat_1_number')->default('10+');
            $table->string('stat_1_text')->default('Tahun Pengalaman');
            $table->string('stat_2_number')->default('50+');
            $table->string('stat_2_text')->default('Produk Pilihan');
            $table->string('stat_3_number')->default('100%');
            $table->string('stat_3_text')->default('Produk Original');

            // About Section
            $table->string('about_title')->default('Importir & Distributor Terpercaya');
            $table->text('about_description_1')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_image')->nullable();

            // Contact Section
            $table->string('cta_title')->default('Tertarik Menjadi Mitra Kami?');
            $table->text('cta_description')->nullable();
            $table->string('phone')->default('+62 823-9001-7777');
            $table->string('email')->default('info@riaufoodlestari.com');
            $table->string('address')->default('Pekanbaru, Riau, Indonesia');
            $table->string('operational_hours')->default('Senin - Sabtu: 08.30 - 17.00 WIB');
            $table->string('instagram_url')->nullable();
            $table->string('whatsapp_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};