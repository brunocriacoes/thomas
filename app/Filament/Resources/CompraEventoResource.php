<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompraEventoResource\Pages;
use App\Filament\Resources\CompraEventoResource\RelationManagers;
use App\Models\CompraEvento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompraEventoResource extends Resource
{
    protected static ?string $model = CompraEvento::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->relationship('usuario', 'name')
                    ->required(),
                Forms\Components\Select::make('evento_id')
                    ->relationship('evento', 'nome')
                    ->required(),
                Forms\Components\DateTimePicker::make('data_compra')
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('evento.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_compra')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
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
            'index' => Pages\ManageCompraEventos::route('/'),
        ];
    }
}
