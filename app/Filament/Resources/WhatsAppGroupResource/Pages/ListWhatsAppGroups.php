<?php

namespace App\Filament\Resources\WhatsAppGroupResource\Pages;

use App\Filament\Resources\WhatsAppGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhatsAppGroups extends ListRecords
{
    protected static string $resource = WhatsAppGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
