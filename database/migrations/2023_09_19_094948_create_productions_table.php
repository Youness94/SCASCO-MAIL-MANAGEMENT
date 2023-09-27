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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->date('date_reception');
            $table->string('nom_police');
            $table->string('nom_assure');

            $table->foreignId('branche_id')->constrained('branches');
            $table->foreignId('compagnie_id')->constrained('compagnies');
            $table->foreignId('act_gestion_id')->constrained('act_gestions');
            $table->foreignId('charge_compte_id')->constrained('charge_comptes');

            $table->date('date_remise');
            $table->date('date_traitement');
            $table->integer('delai_traitement')->nullable();
            $table->string('observation');

            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
