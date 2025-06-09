<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaturaResource\Pages;
use App\Filament\Resources\FaturaResource\RelationManagers;
use App\Models\Fatura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaturaResource extends Resource
{
    protected static ?string $model = Fatura::class;

    protected static ?string $navigationIcon = 'heroicon-o-qr-code';

    protected static ?string $navigationGroup = 'Financeiro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('plano_id')
                    ->relationship('plano', 'periodo')
                    ->nullable(),
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->nullable(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->nullable(),
                Forms\Components\Select::make('aluno_id')
                    ->relationship('aluno', 'nome')
                    ->nullable(),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('referencia'),
                Forms\Components\TextInput::make('referencia_pagamento'),

                Forms\Components\TextInput::make('link_pdf'),
                Forms\Components\TextInput::make('link_comprovante'),
                Forms\Components\TextInput::make('barcode'),
                Forms\Components\Textarea::make('qr_payload')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('descricao')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('qr_image_64')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status_pagamento')
                    ->options([
                        'pendente' => 'Pendente',
                        'pago' => 'Pago',
                        'cancelado' => 'Cancelado',
                        'vencido' => 'Vencido',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('data_vencimento'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plano.periodo')
                    ->label('Plano')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('escola.nome')
                    ->label('Escola')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('aluno.nome')
                    ->label('Aluno')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('referencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('referencia_pagamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_pdf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_comprovante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('barcode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_pagamento')
                    ->label('Status Pagamento')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_vencimento')
                    ->date()
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
            'index' => Pages\ListFaturas::route('/'),
            'create' => Pages\CreateFatura::route('/create'),
            'edit' => Pages\EditFatura::route('/{record}/edit'),
        ];
    }
}
