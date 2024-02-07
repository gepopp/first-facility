<?php

namespace App\Filament\Resources\CountyResource\RelationManagers;

use Filament\Actions\LocaleSwitcher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Attributes\Reactive;

class InfosRelationManager extends RelationManager
{
    use Translatable;

    #[Reactive]
    public ?string $activeLocale = null;

    protected static string $relationship = 'infos';

    public function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\TextInput::make( 'info' )
                                          ->required()
                                          ->maxLength( 255 ),
            ] );
    }

    public function table( Table $table ): Table
    {
        return $table
            ->recordTitleAttribute( 'info' )
            ->columns( [
                Tables\Columns\TextColumn::make( 'info' ),
            ] )
            ->filters( [
                //
            ] )
            ->headerActions( [
//                Tables\Actions\LocaleSwitcher::make(),
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
