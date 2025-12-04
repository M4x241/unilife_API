<?php

namespace App\Filament\Resources\MarketplaceProductResource\Pages;

use App\Filament\Resources\MarketplaceProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMarketplaceProducts extends ListRecords
{
    protected static string $resource = MarketplaceProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
