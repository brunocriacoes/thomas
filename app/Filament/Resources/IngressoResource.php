<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IngressoResource\Pages;
use App\Filament\Resources\IngressoResource\RelationManagers;
use App\Models\Ingresso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IngressoResource extends Resource
{
    protected static ?string $model = Ingresso::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('evento_id')
                    ->relationship('evento', 'nome')
                    ->required(),
                Forms\Components\Select::make('mesa_id')
                    ->relationship('mesa', 'numero_mesa')
                    ->nullable(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('aluno_id')
                    ->relationship('aluno', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('quantidade')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\DateTimePicker::make('data_compra'),
                Forms\Components\Select::make('status_pagamento')
                    ->options([
                        'pendente' => 'Pendente',
                        'pago' => 'Pago',
                        'cancelado' => 'Cancelado',
                        'vencido' => 'Vencido',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('evento.nome')
                    ->label('Evento')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mesa.numero_mesa')
                    ->label('Mesa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_pagamento')
                    ->label('Status Pagamento')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_compra')
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
            'index' => Pages\ListIngressos::route('/'),
            'create' => Pages\CreateIngresso::route('/create'),
            'edit' => Pages\EditIngresso::route('/{record}/edit'),
        ];
    }
}
