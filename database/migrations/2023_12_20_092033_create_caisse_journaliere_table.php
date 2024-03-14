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
       // Exemple de migration pour caisse_journaliere

        Schema::create('caisse_journaliere', function (Blueprint $table) {
            $table->id();
            $table->date('date_caissse')->default(now()->toDateString()); // Ajoutez cette ligne
            $table->decimal('montant_total', 10, 2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caisse_journaliere');
    }
};
