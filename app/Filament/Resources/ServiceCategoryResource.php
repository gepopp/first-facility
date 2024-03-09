<?php

namespace App\Filament\Resources;

use App\Enums\CountriesEnum;
use App\Filament\Resources\ServiceCategoryResource\Pages;
use App\Filament\Resources\ServiceCategoryResource\RelationManagers;
use App\Models\ServiceCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceCategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = ServiceCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\Section::make( 'Basedata' )
                                        ->schema( [
                                            Forms\Components\SpatieMediaLibraryFileUpload::make( 'Images' )
                                                                                         ->hint( 'Max 2 mb' )
                                                                                         ->disk( 's3' )
                                                                                         ->image()
                                                                                         ->columnSpanFull()
                                                                                         ->imageEditor()
                                                                                         ->responsiveImages()
                                                                                         ->rules( [ 'required', 'image', 'max:2024', 'mimes:jpg,png' ] )
                                                                                         ->required(),
                                            Forms\Components\TextInput::make( 'name' )
                                                                      ->required(),
                                            Forms\Components\Textarea::make( 'description' )
                                                                      ->required(),

                                        ] )
                                        ->columnSpan( 3 )
                                        ->columns( 1 ),
                Forms\Components\Section::make( 'Countries' )
                                        ->schema( [
                                            Forms\Components\CheckboxList::make( 'countries' )
                                                                         ->options( CountriesEnum::class )
                                                                         ->default( CountriesEnum::cases() )
                                                                         ->translateLabel( true )
                                                                         ->columnSpanFull()
                                                                         ->columns( 1 )
                                                                         ->label( 'Available in Countries' )
                                                                         ->required(),
                                            Forms\Components\TextInput::make( 'order_on_frontpage' )
                                                                      ->required()
                                                                      ->numeric()
                                                                      ->default( 0 ),
                                        ] )
                                        ->columns( 1 )
                                        ->columnSpan( 1 ),
            ] )->columns( 4 );
    }

    public static function table( Table $table ): Table
    {
        return $table
            ->columns( [
                Tables\Columns\TextColumn::make( 'order_on_frontpage' )
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServiceCategories::route( '/' ),
            'create' => Pages\CreateServiceCategory::route( '/create' ),
            'edit'   => Pages\EditServiceCategory::route( '/{record}/edit' ),
        ];
    }
}
