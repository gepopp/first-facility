<?php

namespace App\Filament\Resources;

use App\Enums\BlogArticleStatusEnum;
use App\Enums\CountriesEnum;
use App\Filament\Resources\BlogArticleResource\Pages;
use App\Filament\Resources\BlogArticleResource\RelationManagers;
use App\Models\BlogArticle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogArticleResource extends Resource
{
    use Translatable;

    protected static ?string $model = BlogArticle::class;

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


                Forms\Components\Select::make( 'status' )
                                       ->options( BlogArticleStatusEnum::class )
                                       ->enum( BlogArticleStatusEnum::class )
                                       ->required(),
                Forms\Components\DateTimePicker::make( 'publish_at' )
                                               ->required(),

                Forms\Components\TextInput::make( 'title' )
                                          ->columnSpanFull()
                                          ->required(),
                Forms\Components\Textarea::make( 'excerpt' )
                                         ->columnSpanFull()
                                         ->required(),
                Forms\Components\RichEditor::make( 'content' )
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
                Tables\Columns\TextColumn::make( 'title' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'status' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'publish_at' )
                                         ->dateTime()
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
            RelationManagers\CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListBlogArticles::route( '/' ),
            'create' => Pages\CreateBlogArticle::route( '/create' ),
            'edit'   => Pages\EditBlogArticle::route( '/{record}/edit' ),
        ];
    }
}
