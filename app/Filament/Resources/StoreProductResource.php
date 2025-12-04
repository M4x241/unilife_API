<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoreProductResource\Pages;
use App\Filament\Resources\StoreProductResource\RelationManagers;
use App\Models\StoreProduct;
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

class StoreProductResource extends Resource
{
    protected static ?string $model = StoreProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nombre')
                    ->required()
                    ->label('Nombre')
                    ->maxLength(255),
                TextInput::make('cantidad')
                    ->required()
                    ->label('Cantidad')
                    ->numeric()
                    ->minValue(0),
                TextInput::make('precio')
                    ->required()
                    ->label('Precio')
                    ->numeric()
                    ->minValue(0),
                Select::make('category_id')
                    ->options([
                        1 => 'Bebida',
                        2 => 'Snack',
                    ])
                    ->required()
                    ->label('Categoría'),
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
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('nombre')->label('Nombre')->searchable()->sortable(),
                TextColumn::make('cantidad')
                    ->label('Cantidad')
                    ->sortable()
                    ->color(function ($record) {
                        if ($record->cantidad < 5) {
                            return 'danger'; // Red
                        } elseif ($record->cantidad < 15) {
                            return 'warning'; // Yellow
                        }
                        return 'success'; // Green
                    }),
                TextColumn::make('precio')->label('Precio')->sortable(),
                TextColumn::make('category.nombre')->label('Categoría')->sortable()->searchable(),

            ])
            ->filters([
                //by cantidad and precio range
                Tables\Filters\Filter::make('cantidad_baja')
                    ->label('Cantidad Baja (<10)')
                    ->query(function (Builder $query) {
                        $query->where('cantidad', '<', 10);
                    }),
                Tables\Filters\Filter::make('precio_range')
                    ->form([
                        TextInput::make('precio_min')->label('Precio Mínimo')->numeric(),
                        TextInput::make('precio_max')->label('Precio Máximo')->numeric(),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['precio_min'], fn(Builder $query, $precioMin) => $query->where('precio', '>=', $precioMin))
                            ->when($data['precio_max'], fn(Builder $query, $precioMax) => $query->where('precio', '<=', $precioMax));
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
            'index' => Pages\ListStoreProducts::route('/'),
            'create' => Pages\CreateStoreProduct::route('/create'),
            'edit' => Pages\EditStoreProduct::route('/{record}/edit'),
        ];
    }
}
