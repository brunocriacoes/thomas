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

    protected static ?string $navigationGroup = 'Financeiro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('periodo')
                    ->options([
                        'manha' => 'Manhã',
                        'tarde' => 'Tarde',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('turno_hora')
                    ->numeric(),
                Forms\Components\TextInput::make('turno_preco_hora')
                    ->numeric(),
                Forms\Components\TextInput::make('socializacao_hora')
                    ->numeric(),
                Forms\Components\TextInput::make('socializacao_preco_hora')
                    ->numeric(),
                Forms\Components\Select::make('ecola_id')
                    ->relationship('escola', 'nome')
                    ->nullable(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->nullable(),
                Forms\Components\Select::make('aluno_id')
                    ->relationship('aluno', 'nome')
                    ->nullable(),
                Forms\Components\Select::make('status')
                    ->options([
                        'ativo' => 'Ativo',
                        'inativo' => 'Inativo',
                        'pendente' => 'Pendente',
                        'cancelado' => 'Cancelado',
                    ])
                    ->required(),
                Forms\Components\RichEditor::make('observacao')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('periodo')
                    ->label('Período')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('turno_hora')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('turno_preco_hora')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('socializacao_hora')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('socializacao_preco_hora')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ecola_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('aluno_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
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
