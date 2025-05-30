<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntradaSaidaResource\Pages;
use App\Filament\Resources\EntradaSaidaResource\RelationManagers;
use App\Models\EntradaSaida;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntradaSaidaResource extends Resource
{
    protected static ?string $model = EntradaSaida::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required(),
                Forms\Components\Select::make('aluno_id')
                    ->relationship('aluno', 'nome')
                    ->required(),
                Forms\Components\DateTimePicker::make('hora_entrada')
                    ->required(),
                Forms\Components\DateTimePicker::make('hora_saida'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('aluno.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_entrada')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_saida')
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
            'index' => Pages\ManageEntradaSaidas::route('/'),
        ];
    }
}
