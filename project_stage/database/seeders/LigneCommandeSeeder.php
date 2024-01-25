<?php

namespace Database\Seeders;
use App\Models\ligneCommande;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LigneCommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ligneCommande::factory()->count(10)->create();
        //
    }
}
