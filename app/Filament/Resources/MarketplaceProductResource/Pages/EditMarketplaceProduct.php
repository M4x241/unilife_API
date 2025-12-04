<?php

namespace App\Filament\Resources\MarketplaceProductResource\Pages;

use App\Filament\Resources\MarketplaceProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMarketplaceProduct extends EditRecord
{
    protected static string $resource = MarketplaceProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
