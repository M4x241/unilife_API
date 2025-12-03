<?php

namespace App\Filament\Resources\UniversitarioResource\Pages;

use App\Filament\Resources\UniversitarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUniversitarios extends ListRecords
{
    protected static string $resource = UniversitarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
