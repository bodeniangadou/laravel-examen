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
    Schema::create('reportages', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->text('description')->nullable();
        $table->integer('duree_minutes');
        $table->integer('position')->default(0);
        $table->foreignId('journaliste_id')->constrained()->onDelete('cascade');
        $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
        $table->foreignId('edition_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportages');
    }
};
