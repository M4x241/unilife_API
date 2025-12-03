<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Anuncios por Carrera';

    protected function getData(): array
    {
        return [
            //anuncios por carreras
            'labels' => ['Ciencias de la Computación', 'Telecomunicaciones', 'TIC', 'Sistemas', 'General'],
            'datasets' => [
                [
                    'label' => 'Anuncios por Carrera',
                    'data' => [
                        \App\Models\Anuncio::where('carrera', 'Ciencias de la Computación')->count(),
                        \App\Models\Anuncio::where('carrera', 'Telecomunicaciones')->count(),
                        \App\Models\Anuncio::where('carrera', 'TIC')->count(),
                        \App\Models\Anuncio::where('carrera', 'Sistemas')->count(),
                        \App\Models\Anuncio::where('carrera', 'General')->count(),
                    ],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
