<?php

namespace Database\Seeders;
use App\Models\produit;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        produit::factory()->count(10)->create();
        //
    }
}
