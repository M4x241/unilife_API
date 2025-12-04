<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarketplaceProductResource\Pages;
use App\Filament\Resources\MarketplaceProductResource\RelationManagers;
use App\Models\MarketplaceProduct;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarketplaceProductResource extends Resource
{
    protected static ?string $model = MarketplaceProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nombre')
                    ->required()
                    ->label('Nombre')
                    ->maxLength(255),
                TextInput::make('descripcion'),
                TextInput::make('precio')
                    ->numeric()
                    ->required(),
                TextInput::make('cu_owner')
                    ->required()
                    ->label('CU Vendedor'),
                TextInput::make('cu_comprador')
                    ->label('CU Comprador'),
                Select::make('status')
                    ->options([
                        'publicado' => 'Publicado',
                        'reservado' => 'Reservado',
                        'vendido' => 'Vendido',

                    ])
                    ->required()
                    ->label('Status'),
                TextInput::make('imagen_url')
                    ->label('Imagen URL')
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre')->label('Nombre')->searchable()->sortable(),
                TextColumn::make('descripcion')->label('Descripción')->limit(50)->wrap(),
                TextColumn::make('precio')->label('Precio')->money('USD', true)->sortable(),
                TextColumn::make('owner.cu')->label('Vendedor')->searchable()->sortable(),
                TextColumn::make('comprador.cu')->label('Comprador')->searchable()->sortable(),
                TextColumn::make('status')->label('Status')->sortable(),
            ])
            ->filters([
                //by status and precio range
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'publicado' => 'Publicado',
                        'reservado' => 'Reservado',
                        'vendido' => 'Vendido',
                    ])
                    ->label('Filtrar por Status'),
                Tables\Filters\Filter::make('precio_range')
                    ->form([
                        TextInput::make('precio_min')->label('Precio Mínimo')->numeric(),
                        TextInput::make('precio_max')->label('Precio Máximo')->numeric(),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['precio_min'], fn (Builder $query, $precioMin) => $query->where('precio', '>=', $precioMin))
                            ->when($data['precio_max'], fn (Builder $query, $precioMax) => $query->where('precio', '<=', $precioMax));
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
            'index' => Pages\ListMarketplaceProducts::route('/'),
            'create' => Pages\CreateMarketplaceProduct::route('/create'),
            'edit' => Pages\EditMarketplaceProduct::route('/{record}/edit'),
        ];
    }
}
