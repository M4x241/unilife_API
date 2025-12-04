<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ActiveData extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Usuarios', \App\Models\Universitario::count())
                ->description('Número total de usuarios registrados')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
            Stat::make('Total Grupos de WhatsApp', \App\Models\WhatsAppGroup::count())
                ->description('Número total de grupos de WhatsApp disponibles')
                ->descriptionIcon('heroicon-o-chat-bubble-left-right')
                ->color('warning'),
            Stat::make('Total Productos en el Marketplace', \App\Models\MarketplaceProduct::count())
                ->description('Número total de productos en el marketplace')
                ->descriptionIcon('heroicon-o-building-storefront')
                ->color('danger'),
            Stat::make('Valor Total del Marketplace', \App\Models\MarketplaceProduct::sum('precio'))
                ->description('Valor total de todos los productos en el marketplace')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('primary'),
            Stat::make('Total Productos en la Tienda', \App\Models\StoreProduct::count())
                ->description('Número total de productos en la tienda')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('secondary'),
            Stat::make('Valor Total de la Tienda', \App\Models\StoreProduct::sum(\DB::raw('precio * cantidad')))
                ->description('Valor total de todos los productos en la tienda')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),
            Stat::make('Total Anuncios', \App\Models\Anuncio::count())
                ->description('Número total de anuncios publicados')
                ->descriptionIcon('heroicon-o-megaphone')
                ->color('success'),

        ];
    }
}
