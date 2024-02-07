<?php

namespace App\Filament\Resources;

use App\Enums\CountriesEnum;
use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Filament\Resources\CountyResource\RelationManagers\InfosRelationManager;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    use Translatable;

    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\CheckboxList::make( 'countries' )
                                             ->options( CountriesEnum::class )
                                             ->default( CountriesEnum::cases() )
                                             ->columnSpanFull()
                                             ->columns( 3 )
                                             ->label( 'Available in Countries' )
                                             ->required(),

                Forms\Components\Select::make( 'country' )
                                       ->label( 'Belongs to Country' )
                                       ->options( CountriesEnum::class )
                                       ->columnSpanFull()
                                       ->required(),


                Forms\Components\TextInput::make( 'name' )
                                          ->columnSpanFull()
                                          ->required(),

                Forms\Components\Textarea::make( 'description' )
                                         ->columnSpanFull()
                                         ->required(),
            ] );
    }

    public static function table( Table $table ): Table
    {
        return $table
            ->columns( [
                Tables\Columns\TextColumn::make( 'country' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'name' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'created_at' )
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable( isToggledHiddenByDefault: true ),
                Tables\Columns\TextColumn::make( 'updated_at' )
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable( isToggledHiddenByDefault: true ),
            ] )
            ->filters( [
                //
            ] )
            ->actions( [
                Tables\Actions\EditAction::make(),
            ] )
            ->bulkActions( [
                Tables\Actions\BulkActionGroup::make( [
                    Tables\Actions\DeleteBulkAction::make(),
                ] ),
            ] );
    }

    public static function getRelations(): array
    {
        return [
            InfosRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCountries::route( '/' ),
            'create' => Pages\CreateCountry::route( '/create' ),
            'edit'   => Pages\EditCountry::route( '/{record}/edit' ),
        ];
    }
}
