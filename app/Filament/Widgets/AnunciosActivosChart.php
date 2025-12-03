<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class AnunciosActivosChart extends ChartWidget
{
    protected static ?string $heading = 'Anuncios Activos';

    protected function getData(): array
    {
        return [
            //anuncios por carreras
            'labels' => ['Ciencias de la Computación', 'Telecomunicaciones', 'TIC', 'Sistemas', 'General'],
            'datasets' => [
                [
                    'label' => 'Anuncios por Carrera',
                    'data' => [
                        \App\Models\Anuncio::where('carrera', 'Ciencias de la Computación')
                            ->where('fecha_finalizacion', '>', now())->count(),
                        \App\Models\Anuncio::where('carrera', 'Telecomunicaciones')
                            ->where('fecha_finalizacion', '>', now())->count(),
                        \App\Models\Anuncio::where('carrera', 'TIC')
                            ->where('fecha_finalizacion', '>', now())->count(),
                        \App\Models\Anuncio::where('carrera', 'Sistemas')
                            ->where('fecha_finalizacion', '>', now())->count(),
                        \App\Models\Anuncio::where('carrera', 'General')
                            ->where('fecha_finalizacion', '>', now())->count(),
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
