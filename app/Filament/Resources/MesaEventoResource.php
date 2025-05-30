<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MesaEventoResource\Pages;
use App\Filament\Resources\MesaEventoResource\RelationManagers;
use App\Models\MesaEvento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MesaEventoResource extends Resource
{
    protected static ?string $model = MesaEvento::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('evento_id')
                    ->relationship('evento', 'id')
                    ->required(),
                Forms\Components\TextInput::make('reservado_por')
                    ->numeric(),
                Forms\Components\TextInput::make('codigo')
                    ->required(),
                Forms\Components\TextInput::make('lugares')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('area')
                    ->required(),
                Forms\Components\TextInput::make('status_pagamento')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('evento.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reservado_por')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lugares')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_pagamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListMesaEventos::route('/'),
            'create' => Pages\CreateMesaEvento::route('/create'),
            'edit' => Pages\EditMesaEvento::route('/{record}/edit'),
        ];
    }
}
