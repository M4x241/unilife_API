<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\StoreCategory::create(['nombre' => 'Bebidas']);
        \App\Models\StoreCategory::create(['nombre' => 'Snacks']);
    }
}
