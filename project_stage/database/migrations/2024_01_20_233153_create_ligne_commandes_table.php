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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->string("quantite");
            $table->string("prix_ligne_commande");
            $table->foreignId("commande_id");
            $table->foreign("commande_id")->references("id")->on("commandes")->cascadeOnDelete();
            $table->foreignId("produit_id");
            $table->foreign("produit_id")->references("id")->on("produits")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
