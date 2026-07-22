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
    Schema::create('editions', function (Blueprint $table) {
        $table->id();
        $table->date('date_diffusion');
        $table->time('heure_diffusion');
        $table->string('type_edition');
        $table->integer('duree_max_minutes');
        $table->string('statut')->default('Brouillon');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editions');
    }
};
