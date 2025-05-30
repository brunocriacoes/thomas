<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlunoResource\Pages;
use App\Filament\Resources\AlunoResource\RelationManagers;
use App\Models\Aluno;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class AlunoResource extends Resource
{
    protected static ?string $model = Aluno::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required(),
                Forms\Components\Select::make('plano_id')
                    ->relationship('plano', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\DatePicker::make('data_nascimento')
                    ->required(),
                FileUpload::make('foto_url')
                    ->image()
                    ->columnSpan(2)
                    ->directory('alunos')
                    ->disk('public')
                    ->imagePreviewHeight('250')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('plano.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                ImageColumn::make('foto_url')
                    ->width(100)
                    ->circular(),
                Tables\Columns\TextColumn::make('data_nascimento')
                    ->date()
                    ->sortable(),
                    ToggleColumn::make('status'),

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
            'index' => Pages\ListAlunos::route('/'),
            'create' => Pages\CreateAluno::route('/create'),
            'edit' => Pages\EditAluno::route('/{record}/edit'),
        ];
    }
}
