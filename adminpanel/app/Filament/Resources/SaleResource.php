<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Models\Sale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'System Management';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput ::make('id')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('restaurant_id')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('rest_name')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('customer_id')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('name')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('bill')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('phone')
                ->required()
                ->maxlength(255),
                
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('restaurant_id')->searchable(),
                Tables\Columns\TextColumn::make('rest_name')->searchable(),
                Tables\Columns\TextColumn::make('customer_id')->searchable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('bill')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                
                //
            ])
            ->filters([
               SelectFilter::make('restaurant_id')
                    ->label('Filter by Restaurant ID')
                    ->options(function () {
                        return Sale::pluck('restaurant_id', 'restaurant_id')->toArray();
                    })
                 
                    
                // Add more filters for other fields if needed
                
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
