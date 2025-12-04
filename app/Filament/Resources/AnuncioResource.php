<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnuncioResource\Pages;
use App\Filament\Resources\AnuncioResource\RelationManagers;
use App\Models\Anuncio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Pages\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;

class AnuncioResource extends Resource
{
    protected static ?string $model = Anuncio::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('carrera')
                    ->options([
                        'Ciencias de la Computación' => 'Ciencias de la Computación',
                        'Telecomunicaciones' => 'Telecomunicaciones',
                        'TIC' => 'TIC',
                        'Sistemas' => 'Sistemas',
                        'General' => 'General',
                    ])
                    ->required()
                    ->label('Carrera'),
                Textarea::make('anuncio')
                    ->required()
                    ->label('Anuncio'),
                Textarea::make('detalles')
                    ->label('Detalles')
                    ->nullable(),
                    Select::make('categoria')
                        ->options([
                            'academico' => 'Académico',
                            'evento' => 'Evento',
                            'importante' => 'Importante',
                            'deportes' => 'Deportes',
                        ])
                        ->required()
                        ->label('Categoría'),
                TextInput::make('fecha_inicio')
                    ->type('date')
                    ->label('Fecha de Inicio'),
                TextInput::make('fecha_finalizacion')
                    ->required()
                    ->type('date')
                    ->label('Fecha de Finalización'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('carrera')->label('Carrera'),
                TextColumn::make('categoria')->label('Categoría'),
                TextColumn::make('fecha_inicio')->label('Fecha de Inicio'),
                TextColumn::make('fecha_finalizacion')->label('Fecha de Finalización'),
                TextColumn::make('anuncio')->label('Anuncio'),

            ])
            ->filters([
                SelectFilter::make('categoria')
                    ->options([
                        'academico' => 'Académico',
                        'evento' => 'Evento',
                        'importante' => 'Importante',
                        'deportes' => 'Deportes',
                    ]),
                selectFilter::make('carrera')
                    ->options([
                        'Ciencias de la Computación' => 'Ciencias de la Computación',
                        'Telecomunicaciones' => 'Telecomunicaciones',
                        'TIC' => 'TIC',
                        'Sistemas' => 'Sistemas',
                        'General' => 'General',
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
            'index' => Pages\ListAnuncios::route('/'),
            'create' => Pages\CreateAnuncio::route('/create'),
            'edit' => Pages\EditAnuncio::route('/{record}/edit'),
        ];
    }
}
