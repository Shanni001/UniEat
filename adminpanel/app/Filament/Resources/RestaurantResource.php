<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantResource\Pages;
use App\Filament\Resources\RestaurantResource\RelationManagers;
use App\Models\Restaurant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;


class RestaurantResource extends Resource
{
    protected static ?string $model = Restaurant::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationGroup = 'System Management';

  

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput ::make('id')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('rest_name')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('rest_address')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('univerity_id')
                ->required()
                ->maxlength(255),
                Forms\Components\FileUpload ::make('image_url')
                ->required(),
               
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('rest_name')->searchable(),
                Tables\Columns\TextColumn::make('rest_address')->searchable(),
                Tables\Columns\TextColumn::make('university_id')->searchable(),
                Tables\Columns\ImageColumn::make('uni_image'),
            
                //
        
            ])
            ->filters([
                SelectFilter::make('rest_name')
                    ->label('Filter by Restaurant Name')
                    ->options(function () {
                        return Restaurant::pluck('rest_name', 'rest_name')->toArray();
                    })
                 
          
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
            'index' => Pages\ListRestaurants::route('/'),
            'create' => Pages\CreateRestaurant::route('/create'),
            'edit' => Pages\EditRestaurant::route('/{record}/edit'),
        ];
    }
}
