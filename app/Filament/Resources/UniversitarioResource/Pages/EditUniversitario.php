<?php

namespace App\Filament\Resources\UniversitarioResource\Pages;

use App\Filament\Resources\UniversitarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUniversitario extends EditRecord
{
    protected static string $resource = UniversitarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Regenerate password if apellidos changed
        if (isset($data['apellidos'])) {
            $data['contrasena'] = bcrypt($this->record->cu . $data['apellidos']);
        }

        return $data;
    }
}
