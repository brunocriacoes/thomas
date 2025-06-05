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

class AlunoResource extends Resource
{
    protected static ?string $model = Aluno::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Cadastro de Pessoas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\Select::make('genero')
                    ->options([
                        'masculino' => 'Masculino',
                        'feminino' => 'Feminino',
                        'outro' => 'Outro',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('data_de_nascimento')
                    ->required(),
                Forms\Components\TextInput::make('nacionalidade'),
                Forms\Components\TextInput::make('cpf')
                    ->required(),
                Forms\Components\TextInput::make('rg'),
                Forms\Components\TextInput::make('plano_de_saude'),
                Forms\Components\Select::make('status')
                    ->options([
                        'ativo' => 'Ativo',
                        'inativo' => 'Inativo',
                    ])
                    ->default('ativo')
                    ->required(),
                Forms\Components\TextInput::make('cep')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\TextInput::make('rua')
                    ->required(),
                Forms\Components\TextInput::make('numero')
                    ->required(),
                Forms\Components\TextInput::make('cidade')
                    ->required(),
                Forms\Components\TextInput::make('estado')
                    ->required(),



                Forms\Components\RichEditor::make('alergias')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('observacao')
                    ->columnSpanFull(),
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required(),

                    
                Forms\Components\Select::make('quem_pode_buscar')
                    ->relationship('quemPodeBuscar', 'name')
                    ->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('genero')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_de_nascimento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cep')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rua')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nacionalidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rg')
                    ->searchable(),
                Tables\Columns\TextColumn::make('plano_de_saude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quem_pode_buscar')
                    ->label('Quem Pode Buscar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('escola_id')
                    ->numeric()
                    ->sortable(),
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
