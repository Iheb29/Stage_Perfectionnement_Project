<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ligneCommande>
 */
class LigneCommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "quantite"=> $this->faker->paragraph(),
            "prix_ligne_commande"=> $this->faker->paragraph(),

            //
        ];
    }
}
