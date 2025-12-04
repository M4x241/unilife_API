<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UniversitarioResource\Pages;
use App\Filament\Resources\UniversitarioResource\RelationManagers;
use App\Models\Universitario;
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

class UniversitarioResource extends Resource
{
    protected static ?string $model = Universitario::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cu')
                    ->required()
                    ->label('CU')
                    ->maxLength(50),

                TextInput::make('nombres')
                    ->required()
                    ->label('Nombres')
                    ->maxLength(255),

                TextInput::make('apellidos')
                    ->required()
                    ->label('Apellidos')
                    ->maxLength(255),

                TextInput::make('correo')
                    ->required()
                    ->label('Correo')
                    ->email()
                    ->maxLength(255),

                TextInput::make('whatsapp')
                    ->label('WhatsApp')
                    ->nullable()
                    ->helperText('Incluya código de país, ej. +59171234567')
                    ->maxLength(50),
                TextInput::make('contrasena')
                    ->label('Contraseña')
                    ->disabled()
                    ->helperText('La contraseña se genera automáticamente como CU + Apellido al crear el registro.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cu')->label('CU')->searchable(),
                TextColumn::make('nombres')->label('Nombres')->searchable(),
                TextColumn::make('apellidos')->label('Apellidos')->searchable(),
                TextColumn::make('correo')->label('Correo')->searchable()->wrap(),
                TextColumn::make('whatsapp')->label('WhatsApp')->toggleable(),
            ])
            ->filters([
                Filter::make('buscar_cu')
                    ->label('Buscar CU')
                    ->form([
                        TextInput::make('cu')->label(false)->placeholder('CU o parte...'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['cu'])) {
                            return $query;
                        }

                        return $query->where('cu', 'like', '%' . $data['cu'] . '%');
                    }),

                Filter::make('has_whatsapp')
                    ->label('Con WhatsApp')
                    ->query(function (Builder $query) {
                        $query->whereNotNull('whatsapp')->where('whatsapp', '<>', '');
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
            'index' => Pages\ListUniversitarios::route('/'),
            'create' => Pages\CreateUniversitario::route('/create'),
            'edit' => Pages\EditUniversitario::route('/{record}/edit'),
        ];
    }
}
