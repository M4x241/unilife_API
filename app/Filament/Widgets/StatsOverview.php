<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Usuarios', \App\Models\Universitario::count())
                ->description('Número total de usuarios registrados')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
            Stat::make('Total Anuncios', \App\Models\Anuncio::count())
                ->description('Número total de anuncios publicados')
                ->descriptionIcon('heroicon-o-megaphone')
                ->color('success'),
            Stat::make('Total Grupos de WhatsApp', \App\Models\WhatsAppGroup::count())
                ->description('Número total de grupos de WhatsApp disponibles')
                ->descriptionIcon('heroicon-o-chat-bubble-oval-left')
                ->color('warning'),
        ];
    }
}
