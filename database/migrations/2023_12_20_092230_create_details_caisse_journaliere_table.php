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
        Schema::create('details_caisse_journaliere', function (Blueprint $table) {
            $table->id('detail_id'); // Automatically increments and creates a 'detail_id' column.
            $table->unsignedBigInteger('caisse_id');
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('caisse_id')->references('id')->on('caisse_journaliere');
            $table->foreign('ticket_id')->references('ticket_id')->on('tickets');

            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_caisse_journaliere');
    }
};
