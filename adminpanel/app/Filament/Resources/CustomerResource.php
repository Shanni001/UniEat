<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'System Management';
   
   public static ?string $recordTitleAttribute = 'fullname';

   
    
        public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput ::make('fullname')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('email')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('phone')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('password')
                ->required()
                ->maxlength(255),
                Forms\Components\TextInput ::make('gender')
                ->required()
                ->maxlength(255),
                //
            ]);
    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullname')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\TextColumn::make('password'),
                Tables\Columns\TextColumn::make('gender'),
                //
        
            ])
            ->filters([
                SelectFilter::make('gender')
                ->options(['female' => 'Female', 'male' => 'Male'])
                ->label('Gender'), // 
                //
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
