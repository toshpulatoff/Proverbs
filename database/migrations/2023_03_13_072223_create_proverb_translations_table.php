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
        Schema::create('proverb_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proverb_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->string('locale', 10)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proverb_translations');
    }
};
