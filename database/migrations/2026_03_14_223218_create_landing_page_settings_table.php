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
        Schema::create('landing_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('El Futuro es Plegable.');
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('cta_text')->default('Ver productos');
            $table->boolean('show_categories')->default(true);
            $table->boolean('show_featured')->default(true);
            $table->integer('featured_count')->default(8);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_page_settings');
    }
};
