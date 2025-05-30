<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SolicitacaoSaqueResource\Pages;
use App\Filament\Resources\SolicitacaoSaqueResource\RelationManagers;
use App\Models\SolicitacaoSaque;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SolicitacaoSaqueResource extends Resource
{
    protected static ?string $model = SolicitacaoSaque::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Comercial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('chave_pix')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('chave_pix')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
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
            'index' => Pages\ManageSolicitacaoSaques::route('/'),
        ];
    }
}
