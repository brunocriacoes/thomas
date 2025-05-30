<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoEventoResource\Pages;
use App\Filament\Resources\ProdutoEventoResource\RelationManagers;
use App\Models\ProdutoEvento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdutoEventoResource extends Resource
{
    protected static ?string $model = ProdutoEvento::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('evento_id')
                    ->relationship('evento', 'id')
                    ->required(),
                Forms\Components\TextInput::make('url_foto'),
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('estoque')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('evento.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url_foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estoque')
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
            'index' => Pages\ListProdutoEventos::route('/'),
            'create' => Pages\CreateProdutoEvento::route('/create'),
            'edit' => Pages\EditProdutoEvento::route('/{record}/edit'),
        ];
    }
}
