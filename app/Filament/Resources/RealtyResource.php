<?php

namespace App\Filament\Resources;

use App\Enums\CountriesEnum;
use App\Filament\Resources\RealtyResource\Pages;
use App\Filament\Resources\RealtyResource\RelationManagers;
use App\Models\Realty;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RealtyResource extends Resource
{
    use Translatable;

    protected static ?string $model = Realty::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\SpatieMediaLibraryFileUpload::make( 'Images' )
                                                             ->hint( 'Max 2 mb' )
                                                             ->disk( 's3' )
                                                             ->image()
                                                             ->columnSpanFull()
                                                             ->imageEditor()
                                                             ->responsiveImages()
                                                             ->multiple()
                                                             ->panelLayout( 'grid' )
                                                             ->rules( [ 'required', 'image', 'max:2024', 'mimes:jpg,png' ] )
                                                             ->required(),

                Forms\Components\Select::make( 'country' )
                                       ->options( CountriesEnum::class )
                                       ->label( 'Country Located' )
                                       ->required(),

                Forms\Components\Select::make( 'realty_category_id' )
                                       ->relationship( 'category', 'name' )
                                       ->getOptionLabelFromRecordUsing( fn( $record, $livewire ) => $record->getTranslation( 'name', 'en' ) )
                                       ->required(),
                Forms\Components\TextInput::make( 'name' )
                                          ->columnSpanFull()
                                          ->required(),
                Forms\Components\Textarea::make( 'description' )
                                          ->columnSpanFull()
                                          ->required(),

                Forms\Components\CheckboxList::make( 'countries' )
                                             ->options( CountriesEnum::class )
                                             ->default( CountriesEnum::cases() )
                                             ->translateLabel( true )
                                             ->columnSpanFull()
                                             ->columns( 3 )
                                             ->label( 'Available in Countries' )
                                             ->required(),

            ] );
    }

    public static function table( Table $table ): Table
    {
        return $table
            ->columns( [
                Tables\Columns\TextColumn::make( 'name' )
                                         ->numeric()
                                         ->sortable(),
                Tables\Columns\TextColumn::make( 'category.name' )
                                         ->numeric()
                                         ->sortable(),
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
            RelationManagers\MetasRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListRealties::route( '/' ),
            'create' => Pages\CreateRealty::route( '/create' ),
            'edit'   => Pages\EditRealty::route( '/{record}/edit' ),
        ];
    }
}
