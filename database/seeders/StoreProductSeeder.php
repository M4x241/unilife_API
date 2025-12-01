<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs
        $bebidasId = \App\Models\StoreCategory::where('nombre', 'Bebidas')->first()->id;
        $snacksId = \App\Models\StoreCategory::where('nombre', 'Snacks')->first()->id;

        // Bebidas
        $bebidas = [
            ['nombre' => 'Coca Cola 500ml', 'imagen_url' => 'https://images.unsplash.com/photo-1554866585-cd94860890b7', 'cantidad' => 50, 'precio' => 5.00],
            ['nombre' => 'Sprite 500ml', 'imagen_url' => 'https://images.unsplash.com/photo-1625772299848-391b6a87d7b3', 'cantidad' => 45, 'precio' => 5.00],
            ['nombre' => 'Fanta 500ml', 'imagen_url' => 'https://images.unsplash.com/photo-1624517452488-04869289c4ca', 'cantidad' => 40, 'precio' => 5.00],
            ['nombre' => 'Agua Vital 500ml', 'imagen_url' => 'https://images.unsplash.com/photo-1548839140-29a749e1cf4d', 'cantidad' => 100, 'precio' => 3.00],
            ['nombre' => 'Jugo Del Valle 1L', 'imagen_url' => 'https://images.unsplash.com/photo-1600271886742-f049cd451bba', 'cantidad' => 30, 'precio' => 8.00],
            ['nombre' => 'Red Bull 250ml', 'imagen_url' => 'https://images.unsplash.com/photo-1622543925917-763c34f6a1a7', 'cantidad' => 25, 'precio' => 12.00],
            ['nombre' => 'Café Latte', 'imagen_url' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735', 'cantidad' => 20, 'precio' => 10.00],
            ['nombre' => 'Té Helado', 'imagen_url' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc', 'cantidad' => 35, 'precio' => 6.00],
        ];

        foreach ($bebidas as $bebida) {
            \App\Models\StoreProduct::create([
                'category_id' => $bebidasId,
                'nombre' => $bebida['nombre'],
                'imagen_url' => $bebida['imagen_url'],
                'cantidad' => $bebida['cantidad'],
                'precio' => $bebida['precio'],
            ]);
        }

        // Snacks
        $snacks = [
            ['nombre' => 'Papas Lays Original', 'imagen_url' => 'https://images.unsplash.com/photo-1566478989037-eec170784d0b', 'cantidad' => 60, 'precio' => 4.00],
            ['nombre' => 'Doritos Nacho', 'imagen_url' => 'https://images.unsplash.com/photo-1613919113640-c3c8e2e9d75b', 'cantidad' => 55, 'precio' => 4.50],
            ['nombre' => 'Cheetos', 'imagen_url' => 'https://images.unsplash.com/photo-1621939514649-280e2ee25f60', 'cantidad' => 50, 'precio' => 4.00],
            ['nombre' => 'Galletas Oreo', 'imagen_url' => 'https://images.unsplash.com/photo-1606890737304-57a1ca8a5b62', 'cantidad' => 40, 'precio' => 6.00],
            ['nombre' => 'Chocolate Snickers', 'imagen_url' => 'https://images.unsplash.com/photo-1599599810769-bcde5a160d32', 'cantidad' => 45, 'precio' => 5.00],
            ['nombre' => 'M&Ms', 'imagen_url' => 'https://images.unsplash.com/photo-1629203851122-3726ecdf080e', 'cantidad' => 50, 'precio' => 5.50],
            ['nombre' => 'Chicles Trident', 'imagen_url' => 'https://images.unsplash.com/photo-1582058091505-f87a2e55a40f', 'cantidad' => 70, 'precio' => 2.00],
            ['nombre' => 'Maní Salado', 'imagen_url' => 'https://images.unsplash.com/photo-1608797178974-15b35a64ede9', 'cantidad' => 35, 'precio' => 3.50],
            ['nombre' => 'Gomitas Haribo', 'imagen_url' => 'https://images.unsplash.com/photo-1582058091505-f87a2e55a40f', 'cantidad' => 40, 'precio' => 4.50],
            ['nombre' => 'Pretzels', 'imagen_url' => 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087', 'cantidad' => 30, 'precio' => 3.00],
        ];

        foreach ($snacks as $snack) {
            \App\Models\StoreProduct::create([
                'category_id' => $snacksId,
                'nombre' => $snack['nombre'],
                'imagen_url' => $snack['imagen_url'],
                'cantidad' => $snack['cantidad'],
                'precio' => $snack['precio'],
            ]);
        }
    }
}
