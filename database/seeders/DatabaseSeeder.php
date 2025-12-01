<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed in order: students first, then categories, then products that reference them
        $this->call([
            UniversitarioSeeder::class,
            StoreCategorySeeder::class,
            StoreProductSeeder::class,
            MarketplaceProductSeeder::class,
            AnuncioSeeder::class,
            WhatsAppGroupSeeder::class,
        ]);
    }
}
