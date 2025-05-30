<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventoResource\Pages;
use App\Filament\Resources\EventoResource\RelationManagers;
use App\Models\Evento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventoResource extends Resource
{
    protected static ?string $model = Evento::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\Textarea::make('descricao')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('imagem_url'),
                Forms\Components\DateTimePicker::make('data_inicio')
                    ->required(),
                Forms\Components\DateTimePicker::make('data_fim')
                    ->required(),
                Forms\Components\TextInput::make('andar')
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
                Tables\Columns\TextColumn::make('imagem_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_inicio')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_fim')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('andar')
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
            'index' => Pages\ListEventos::route('/'),
            'create' => Pages\CreateEvento::route('/create'),
            'edit' => Pages\EditEvento::route('/{record}/edit'),
        ];
    }
}
