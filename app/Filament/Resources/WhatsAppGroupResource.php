<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhatsAppGroupResource\Pages;
use App\Filament\Resources\WhatsAppGroupResource\RelationManagers;
use App\Models\WhatsAppGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\Filter;

class WhatsAppGroupResource extends Resource
{
    protected static ?string $model = WhatsAppGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('group_name')
                    ->required()
                    ->label('Nombre del Grupo')
                    ->maxLength(255),

                TextInput::make('link')
                    ->required()
                    ->label('Enlace')
                    ->url()
                    ->helperText('Enlace al grupo de WhatsApp')
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group_name')->label('Nombre')->searchable()->sortable(),
                TextColumn::make('link')->label('Enlace')->wrap()->url(fn ($record) => $record->link),
            ])
            ->filters([
                Filter::make('buscar_nombre')
                    ->label('Buscar Nombre')
                    ->form([
                        TextInput::make('group_name')->label(false)->placeholder('Nombre o parte...'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['group_name'])) {
                            return $query;
                        }

                        return $query->where('group_name', 'like', '%' . $data['group_name'] . '%');
                    }),

                Filter::make('has_link')
                    ->label('Con enlace')
                    ->query(function (Builder $query) {
                        $query->whereNotNull('link')->where('link', '<>', '');
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWhatsAppGroups::route('/'),
            'create' => Pages\CreateWhatsAppGroup::route('/create'),
            'edit' => Pages\EditWhatsAppGroup::route('/{record}/edit'),
        ];
    }
}
