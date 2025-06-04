<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MensalidadeResource\Pages;
use App\Filament\Resources\MensalidadeResource\RelationManagers;
use App\Models\Mensalidade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MensalidadeResource extends Resource
{
    protected static ?string $model = Mensalidade::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    protected static ?string $navigationGroup = 'Cadastro da escola';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Select::make('escola_id')
                            ->relationship('escola', 'nome')
                            ->required(),
                        Forms\Components\TextInput::make('valor')
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('dia_pagamento')
                            ->required()
                            ->options(array_combine(range(1, 31), range(1, 31))),
                        Forms\Components\RichEditor::make('observacao')
                            ->columnSpanFull(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dia_pagamento')
                    ->numeric()
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
            'index' => Pages\ListMensalidades::route('/'),
            'create' => Pages\CreateMensalidade::route('/create'),
            'edit' => Pages\EditMensalidade::route('/{record}/edit'),
        ];
    }
}
