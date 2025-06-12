<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MesaResource\Pages;
use App\Filament\Resources\MesaResource\RelationManagers;
use App\Models\Mesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MesaResource extends Resource
{
    protected static ?string $model = Mesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('url_foto')
                    ->image()
                    ->columnSpan(2),
                Forms\Components\Select::make('evento_id')
                    ->relationship('evento', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('numero_mesa')
                    ->required(),

                Forms\Components\TextInput::make('quantidade_cadeiras')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('localizacao')
                    ->options([
                        '2°Andar' => '2° Andar',
                        'Térreo' => 'Térreo',
                    ])
                    ->nullable(),
                Forms\Components\Select::make('area')
                    ->options([
                        'coberta' => 'Coberta',
                        'descoberta' => 'Descoberta',
                    ])
                    ->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('evento_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('url_foto'),
                Tables\Columns\TextColumn::make('quantidade_cadeiras')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('localizacao')
                    ->label('Localização')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area')
                    ->label('Área')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_mesa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('evento.nome')
                    ->label('Evento')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListMesas::route('/'),
            'create' => Pages\CreateMesa::route('/create'),
            'edit' => Pages\EditMesa::route('/{record}/edit'),
        ];
    }
}
