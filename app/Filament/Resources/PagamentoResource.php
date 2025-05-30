<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagamentoResource\Pages;
use App\Filament\Resources\PagamentoResource\RelationManagers;
use App\Models\Pagamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PagamentoResource extends Resource
{
    protected static ?string $model = Pagamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Comercial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->relationship('usuario', 'name')
                    ->required(),
                Forms\Components\Select::make('aluno_id')
                    ->relationship('aluno', 'nome'),
                Forms\Components\Select::make('plano_id')
                    ->relationship('plano', 'nome'),
                Forms\Components\Select::make('evento_id')
                    ->relationship('evento', 'nome'),
                Forms\Components\TextInput::make('tipo')
                    ->required(),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\DateTimePicker::make('data_pagamento'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('aluno.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('plano.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('evento.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_pagamento')
                    ->dateTime()
                    ->sortable(),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePagamentos::route('/'),
        ];
    }
}
