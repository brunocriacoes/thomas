<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanoResource\Pages;
use App\Filament\Resources\PlanoResource\RelationManagers;
use App\Models\Plano;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlanoResource extends Resource
{
    protected static ?string $model = Plano::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    protected static ?string $navigationGroup = 'Planos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'id')
                    ->required(),
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\TextInput::make('periodo')
                    ->required(),
                Forms\Components\TextInput::make('horas_inclusas')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('valor_mensal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('valor_hora_extra')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('periodo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('horas_inclusas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor_mensal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor_hora_extra')
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
            'index' => Pages\ListPlanos::route('/'),
            'create' => Pages\CreatePlano::route('/create'),
            'edit' => Pages\EditPlano::route('/{record}/edit'),
        ];
    }
}
