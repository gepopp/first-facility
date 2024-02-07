<?php

namespace App\Filament\Resources;

use App\Enums\CountriesEnum;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use App\Models\HeroSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    use Translatable;

    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\SpatieMediaLibraryFileUpload::make( 'Hero Image' )
                                                             ->hint( 'Max 2 mb' )
                                                             ->disk( 's3' )
                                                             ->image()
                                                             ->columnSpanFull()
                                                             ->imageEditor()
                                                             ->responsiveImages()
                                                             ->rules( [ 'required', 'image', 'max:2024', 'mimes:jpg,png' ] )
                                                             ->required(),

                Forms\Components\TextInput::make( 'academic_degree' )
                                          ->maxLength( 255 ),
                Forms\Components\TextInput::make( 'name' )
                                          ->required()
                                          ->maxLength( 255 ),
                Forms\Components\TextInput::make( 'postgraduate' )
                                          ->maxLength( 255 ),
                Forms\Components\TextInput::make( 'position' ),
                Forms\Components\TextInput::make( 'email' )
                                          ->email()
                                          ->maxLength( 255 ),
                Forms\Components\TextInput::make( 'tel' )
                                          ->tel()
                                          ->maxLength( 255 ),
                Forms\Components\Textarea::make( 'description' )
                                         ->columnSpanFull(),
                Forms\Components\CheckboxList::make( 'countries' )
                                             ->options( CountriesEnum::class )
                                             ->translateLabel( true )
                                             ->columnSpanFull()
                                             ->columns( 3 )
                                             ->label( 'Available in Countries' )
                                             ->required(),
                Forms\Components\TextInput::make( 'order' )
                                          ->numeric()
                                          ->required()
                                          ->numeric(),
            ] );
    }

    public static function table( Table $table ): Table
    {
        return $table
            ->columns( [
                Tables\Columns\TextColumn::make( 'academic_degree' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'name' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'postgraduate' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'email' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'tel' )
                                         ->searchable(),
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
            'index'  => Pages\ListEmployees::route( '/' ),
            'create' => Pages\CreateEmployee::route( '/create' ),
            'edit'   => Pages\EditEmployee::route( '/{record}/edit' ),
        ];
    }
}
