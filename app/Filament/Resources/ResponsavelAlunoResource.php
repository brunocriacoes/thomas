<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResponsavelAlunoResource\Pages;
use App\Filament\Resources\ResponsavelAlunoResource\RelationManagers;
use App\Models\ResponsavelAluno;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResponsavelAlunoResource extends Resource
{
    protected static ?string $model = ResponsavelAluno::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->relationship('usuario', 'name')
                    ->required(),
                Forms\Components\Select::make('aluno_id')
                    ->relationship('aluno', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('parentesco')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('aluno.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parentesco')
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
            'index' => Pages\ListResponsavelAlunos::route('/'),
            'create' => Pages\CreateResponsavelAluno::route('/create'),
            'edit' => Pages\EditResponsavelAluno::route('/{record}/edit'),
        ];
    }
}
