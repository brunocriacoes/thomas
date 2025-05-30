<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanoHorarioResource\Pages;
use App\Filament\Resources\PlanoHorarioResource\RelationManagers;
use App\Models\PlanoHorario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlanoHorarioResource extends Resource
{
    protected static ?string $model = PlanoHorario::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Planos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('plano_id')
                    ->relationship('plano', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('dia_semana')
                    ->required(),
                Forms\Components\TextInput::make('hora_inicio')
                    ->required(),
                Forms\Components\TextInput::make('hora_fim')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plano.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dia_semana')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hora_inicio'),
                Tables\Columns\TextColumn::make('hora_fim'),
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
            'index' => Pages\ListPlanoHorarios::route('/'),
            'create' => Pages\CreatePlanoHorario::route('/create'),
            'edit' => Pages\EditPlanoHorario::route('/{record}/edit'),
        ];
    }
}
