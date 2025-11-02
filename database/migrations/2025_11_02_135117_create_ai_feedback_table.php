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
        Schema::create('ai_feedback', function (Blueprint $table) {
    $table->id();
    $table->foreignId('consultation_id')->constrained()->onDelete('cascade');
    $table->string('model_used', 100);
    $table->text('feedback');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_feedback');
    }
};
