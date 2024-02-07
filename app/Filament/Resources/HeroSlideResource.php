<?php

namespace App\Filament\Resources;


use App\Enums\CountriesEnum;
use App\Filament\Resources\HeroSlideResource\Pages;
use App\Filament\Resources\HeroSlideResource\RelationManagers;
use App\Models\HeroSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSlideResource extends Resource
{
    use Translatable;

    protected static ?string $model = HeroSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\SpatieMediaLibraryFileUpload::make( 'Hero Image' )
                                                             ->hint( 'Max 2 mb, dimension: 16:9' )
                                                             ->disk( 's3' )
                                                             ->image()
                                                             ->columnSpanFull()
                                                             ->imageEditor()
                                                             ->imageCropAspectRatio( '16:9' )
                                                             ->responsiveImages()
                                                             ->rules( [ 'required', 'image', 'max:2024', 'mimes:jpg,png' ] )
                                                             ->required(),
                Forms\Components\TextInput::make( 'title' )
                                          ->columnSpanFull()
                                          ->required(),
                Forms\Components\Textarea::make( 'description' )
                                         ->columnSpanFull()
                                         ->required(),
                Forms\Components\TextInput::make( 'link' )
                                          ->columnSpanFull()
                                          ->required()
                                          ->maxLength( 65535 )
                                          ->columnSpanFull(),
                Forms\Components\TextInput::make( 'order' )
                                          ->unique( ignoreRecord: true )
                                          ->default( function () {
                                              $max = HeroSlide::max( 'order' );
                                              $max = $max + 10;

                                              return $max;
                                          } )
                                          ->numeric()
                                          ->required()
                                          ->numeric(),
                Forms\Components\TextInput::make( 'delay' )
                                          ->label( 'Shows how long' )
                                          ->hint( 'Time the slide stays on screen, in milliseconds' )
                                          ->required()
                                          ->numeric()
                                          ->numeric()
                                          ->default( 3000 ),

                Forms\Components\CheckboxList::make( 'countries' )
                                             ->options( CountriesEnum::class )
                                             ->translateLabel( true )
                                             ->default( CountriesEnum::cases() )
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
                Tables\Columns\TextInputColumn::make( 'order' )
                                              ->rules( [ 'required', 'integer', 'min:1' ] )
                                              ->sortable(),
                Tables\Columns\TextColumn::make( 'title' ),
                Tables\Columns\TextInputColumn::make( 'delay' )
                                              ->rules( [ 'required', 'integer', 'min:1' ] ),
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
            'index'  => Pages\ListHeroSlides::route( '/' ),
            'create' => Pages\CreateHeroSlide::route( '/create' ),
            'edit'   => Pages\EditHeroSlide::route( '/{record}/edit' ),
        ];
    }
}
