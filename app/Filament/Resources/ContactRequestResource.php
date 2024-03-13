<?php

namespace App\Filament\Resources;

use App\Enums\CountriesEnum;
use App\Filament\Resources\ContactRequestResource\Pages;
use App\Filament\Resources\ContactRequestResource\RelationManagers;
use App\Models\ContactRequest;
use App\Models\ServiceCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactRequestResource extends Resource
{
    protected static ?string $model = ContactRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\Section::make()
                                        ->schema( [
                                            Forms\Components\DateTimePicker::make( 'validated_at' )
                                                                           ->readOnly(),
                                            Forms\Components\TextInput::make( 'name' )
                                                                      ->required()
                                                                      ->maxLength( 255 ),
                                            Forms\Components\TextInput::make( 'email' )
                                                                      ->email()
                                                                      ->required()
                                                                      ->maxLength( 255 ),
                                            Forms\Components\TextInput::make( 'phone' )
                                                                      ->tel()
                                                                      ->maxLength( 255 ),
                                            Forms\Components\Textarea::make( 'message' )
                                                                     ->required()
                                                                     ->columnSpanFull(),
                                        ] )
                                        ->columnSpan( 3 ),
                Forms\Components\Section::make()
                                        ->schema( [
                                            Forms\Components\CheckboxList::make( 'to_countries' )
                                                                         ->options( CountriesEnum::toAssociativeArray() )
                                                                         ->required(),

                                            Forms\Components\CheckboxList::make( 'service_categories' )
                                                                         ->options( fn() => ServiceCategory::all()->pluck( 'name', 'id' )->toArray() ),
                                        ] )->columnSpan( 1 ),

            ] )->columns( 4 );
    }

    public static function table( Table $table ): Table
    {
        return $table
            ->columns( [
                Tables\Columns\TextColumn::make( 'name' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'email' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'phone' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'deleted_at' )
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable( isToggledHiddenByDefault: true ),
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
            'index'  => Pages\ListContactRequests::route( '/' ),
            'create' => Pages\CreateContactRequest::route( '/create' ),
            'edit'   => Pages\EditContactRequest::route( '/{record}/edit' ),
        ];
    }
}
