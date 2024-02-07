<?php

namespace App\Filament\Resources\RealtyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Attributes\Reactive;

class MetasRelationManager extends RelationManager
{
    use Translatable;


    protected static string $relationship = 'metas';

    public function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\TextInput::make( 'name' )
                                          ->required()
                                          ->maxLength( 255 ),

                Forms\Components\TextInput::make( 'value' )
                                          ->required()
                                          ->maxLength( 255 ),
            ] );
    }

    public function table( Table $table ): Table
    {
        return $table
            ->recordTitleAttribute( 'value' )
            ->columns( [
                Tables\Columns\TextColumn::make( 'name' ),
                Tables\Columns\TextColumn::make( 'value' ),
            ] )
            ->filters( [
                //
            ] )
            ->headerActions( [
                Tables\Actions\LocaleSwitcher::make(),
                Tables\Actions\CreateAction::make(),
            ] )
            ->actions( [
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ] )
            ->bulkActions( [
                Tables\Actions\BulkActionGroup::make( [
                    Tables\Actions\DeleteBulkAction::make(),
                ] ),
            ] );
    }
}
