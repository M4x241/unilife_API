<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketplaceProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Calculadora Científica Casio FX-991',
                'descripcion' => 'Calculadora en excelente estado, poco uso. Ideal para ingeniería.',
                'imagen_url' => 'https://images.unsplash.com/photo-1611224923853-80b023f02d71',
                'precio' => 150.00,
                'cu_owner' => '20210001',
                'cu_comprador' => null,
            ],
            [
                'nombre' => 'Libro: Algoritmos y Estructuras de Datos',
                'descripcion' => 'Libro en perfecto estado, sin marcas ni rayones.',
                'imagen_url' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f',
                'precio' => 80.00,
                'cu_owner' => '20210002',
                'cu_comprador' => '20210001',
                'status' => 'vendido',
            ],
            [
                'nombre' => 'Laptop HP Core i5',
                'descripcion' => 'Laptop en buen estado, 8GB RAM, 256GB SSD. Ideal para programación.',
                'imagen_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853',
                'precio' => 2500.00,
                'cu_owner' => '20210003',
                'cu_comprador' => null,
                'status' => 'publicado',
            ],
            [
                'nombre' => 'Arduino Uno R3',
                'descripcion' => 'Kit completo con sensores y cables. Perfecto para proyectos.',
                'imagen_url' => 'https://images.unsplash.com/photo-1553406830-ef2513450d76',
                'precio' => 200.00,
                'cu_owner' => '20210004',
                'cu_comprador' => '20210001',
                'status' => 'reservado',
            ],
            [
                'nombre' => 'Mochila para Laptop',
                'descripcion' => 'Mochila resistente con compartimento acolchado para laptop de 15".',
                'imagen_url' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62',
                'precio' => 120.00,
                'cu_owner' => '20210005',
                'cu_comprador' => '20220002',
            ],
            [
                'nombre' => 'Mouse Logitech MX Master',
                'descripcion' => 'Mouse inalámbrico ergonómico, como nuevo.',
                'imagen_url' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46',
                'precio' => 180.00,
                'cu_owner' => '20220001',
                'cu_comprador' => null,
            ],
            [
                'nombre' => 'Teclado Mecánico RGB',
                'descripcion' => 'Teclado mecánico con switches azules, iluminación RGB.',
                'imagen_url' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3',
                'precio' => 250.00,
                'cu_owner' => '20220002',
                'cu_comprador' => null,
            ],
            [
                'nombre' => 'Audífonos Sony WH-1000XM4',
                'descripcion' => 'Audífonos con cancelación de ruido, excelente calidad de audio.',
                'imagen_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
                'precio' => 800.00,
                'cu_owner' => '20220003',
                'cu_comprador' => null,
            ],
            [
                'nombre' => 'Tablet Samsung Galaxy Tab',
                'descripcion' => 'Tablet de 10 pulgadas, ideal para tomar notas y leer.',
                'imagen_url' => 'https://images.unsplash.com/photo-1561154464-82e9adf32764',
                'precio' => 1200.00,
                'cu_owner' => '20220004',
                'cu_comprador' => null,
            ],
            [
                'nombre' => 'Disco Duro Externo 1TB',
                'descripcion' => 'Disco duro portátil, USB 3.0, perfecto para backups.',
                'imagen_url' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b',
                'precio' => 180.00,
                'cu_owner' => '20220005',
                'cu_comprador' => null,
            ],
        ];

        foreach ($productos as $producto) {
            \App\Models\MarketplaceProduct::create($producto);
        }
    }
}
