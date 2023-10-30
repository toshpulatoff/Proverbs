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
        Schema::create('proverbs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            //$table->string('image_url', 1000);
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description', 255)->nullable();
            $table->text('meta_keywords', 255)->nullable();
            $table->string('canonical_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proverbs');
    }
};
