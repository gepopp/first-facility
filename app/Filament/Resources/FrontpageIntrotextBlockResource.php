<?php

namespace App\Filament\Resources;

use App\Enums\CountriesEnum;
use App\Filament\Resources\FrontpageIntrotextBlockResource\Pages;
use App\Filament\Resources\FrontpageIntrotextBlockResource\RelationManagers;
use App\Models\FrontpageIntrotextBlock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FrontpageIntrotextBlockResource extends Resource
{
    use Translatable;

    protected static ?string $model = FrontpageIntrotextBlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\TextInput::make( 'pre_heading' )
                                          ->required()
                                          ->columnSpanFull(),
                Forms\Components\TextInput::make( 'heading' )
                                          ->required()
                                          ->columnSpanFull(),
                Forms\Components\Textarea::make( 'excerpt' )
                                         ->hint( 'The bold text in the 2nd column' )
                                         ->required()
                                         ->columnSpanFull(),
                Forms\Components\Textarea::make( 'text' )
                                         ->required()
                                         ->columnSpanFull(),
                Forms\Components\Repeater::make( 'links' )
                                         ->schema( [
                                             Forms\Components\TextInput::make( 'link text' )->required(),
                                             Forms\Components\TextInput::make( 'link' )->required(),
                                         ] )
                                         ->columns( 2 )
                                         ->columnSpanFull(),

                Forms\Components\SpatieMediaLibraryFileUpload::make( 'Hero Image' )
                                                             ->hint( 'Max 2 mb, dimension: 16:9' )
                                                             ->disk( 's3' )
                                                             ->image()
                                                             ->imageEditor()
                                                             ->imageCropAspectRatio( '16:9' )
                                                             ->responsiveImages()
                                                             ->rules( [ 'required', 'image', 'max:2024', 'mimes:jpg,png' ] )
                                                             ->required(),

                Forms\Components\Textarea::make( 'embed_code' ),

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
                //
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
            'index'  => Pages\ListFrontpageIntrotextBlocks::route( '/' ),
            'create' => Pages\CreateFrontpageIntrotextBlock::route( '/create' ),
            'edit'   => Pages\EditFrontpageIntrotextBlock::route( '/{record}/edit' ),
        ];
    }
}
