<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EscolaResource\Pages;
use App\Filament\Resources\EscolaResource\RelationManagers;
use App\Models\Escola;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EscolaResource extends Resource
{
    protected static ?string $model = Escola::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\TextInput::make('cnpj')
                    ->required(),
                Forms\Components\TextInput::make('logo_url'),
                Forms\Components\TextInput::make('cor_primaria')
                    ->required(),
                Forms\Components\TextInput::make('cor_secundaria')
                    ->required(),
                Forms\Components\TextInput::make('dominio')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cnpj')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cor_primaria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cor_secundaria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dominio')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ListEscolas::route('/'),
            'create' => Pages\CreateEscola::route('/create'),
            'edit' => Pages\EditEscola::route('/{record}/edit'),
        ];
    }
}
