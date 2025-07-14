<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeioPagamentoResource\Pages;
use App\Filament\Resources\MeioPagamentoResource\RelationManagers;
use App\Models\MeioPagamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeioPagamentoResource extends Resource
{
    protected static ?string $model = MeioPagamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('a_partir')
                    ->label('A partir')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('meio_pagamento')
                    ->options([
                        'pagseguro' => 'PagSeguro',
                        'asaas' => 'Asaas',
                        'zoop' => 'Zoop',
                        'pagar-me' => 'Pagar.me',
                        'mercado_pago' => 'Mercado Pago',
                    ])
                    ->required(),
                Forms\Components\Select::make('tipo_pagamento')
                    ->options([
                        'PIX' => 'PIX',
                        'CREDIT_CARD' => 'CREDIT_CARD',
                        'BOLETO' => 'BOLETO',
                    ])
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'produção' => 'Produção',
                        'desenvolvimento' => 'Desenvolvimento',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('chave'),
                Forms\Components\TextInput::make('codigo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola.nome')
                    ->label('Escola')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipos')
                    ->label('Tipos')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('chave')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
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
            'index' => Pages\ListMeioPagamentos::route('/'),
            'create' => Pages\CreateMeioPagamento::route('/create'),
            'edit' => Pages\EditMeioPagamento::route('/{record}/edit'),
        ];
    }
}
