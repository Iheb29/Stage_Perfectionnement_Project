<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom"=>$this->faker->word(),
            "prenom"=>$this->faker->word(),
            "adresse_email"=> $this->faker->unique()->safeEmail,
            "ville"=> $this->faker->paragraph(),
            "prix_total"=>$this->faker->randomFloat(),
            "status"=>$this->faker->boolean(),
            "code_commande"=>$this->faker->numberBetween(1,1000),
            //
        ];
    }
}
