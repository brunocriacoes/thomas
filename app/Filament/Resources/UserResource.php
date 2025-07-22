<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Cadastro de Pessoas';

    protected static ?string $navigationLabel = 'Responsáveis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required(),
                Forms\Components\TextInput::make('telefone')
                    ->label('Telefone')
                    ->tel()
                    ->mask('(99) 99999-9999'),

                Forms\Components\Select::make('genero')
                    ->label('Gênero')
                    ->options([
                        'masculino' => 'Masculino',
                        'feminino' => 'Feminino',
                        'não_binário' => 'Não Binário',
                        'prefiro_não_informar' => 'Prefiro Não Informar',
                        'outro' => 'Outro',
                    ])
                    ->nullable(),
                // Forms\Components\Select::make('estado_civil')
                //     ->label('Estado Civil')
                //     ->options([
                //         'solteiro' => 'Solteiro',
                //         'casado' => 'Casado',
                //         'divorciado' => 'Divorciado',
                //         'viuvo' => 'Viúvo',
                //     ])
                //     ->nullable(),
                Forms\Components\Select::make('parentesco')
                    ->label('Parentesco')
                    ->options([
                        'pai' => 'Pai',
                        'mãe' => 'Mãe',
                        'tutor' => 'Tutor',
                        'outro' => 'Outro',
                    ])
                    ->nullable(),
                // Forms\Components\TextInput::make('profissao')->label('Profissão'),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'ativo' => 'Ativo',
                        'inativo' => 'Inativo',
                        'suspenso' => 'Suspenso',
                    ])
                    ->default('ativo')
                    ->required(),
                // Forms\Components\Select::make('escola_id')
                //     ->label('Escola')
                //     ->relationship('escola', 'nome')
                //     ->nullable(),
                Forms\Components\TextInput::make('cpf')
                    ->label('CPF')
                    ->mask('999.999.999-99'),
                // Forms\Components\TextInput::make('rg')
                //     ->label('RG')
                //     ->mask('99.999.999-9'),
                Forms\Components\TextInput::make('cep')
                    ->label('CEP')
                    ->mask('99999-999'),
                Forms\Components\TextInput::make('endereco')
                    ->label('Endereço'),
                Forms\Components\TextInput::make('numero')
                    ->label('Número'),
                Forms\Components\TextInput::make('bairro')
                    ->label('Bairro'),
                Forms\Components\TextInput::make('cidade')
                    ->label('Cidade'),
                Forms\Components\TextInput::make('estado')
                    ->label('Estado'),

                // Forms\Components\TextInput::make('nacionalidade')
                //     ->label('Nacionalidade')
                //     ->columnSpan(2),
                Forms\Components\RichEditor::make('observacoes')
                    ->label('Observações')
                    ->columnSpanFull(),
                // Forms\Components\TextInput::make('cargo')
                //     ->label('Cargo')
                //     ->nullable(),
                Forms\Components\Select::make('roles')
                    ->label('Perfis')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('telefone')
                    ->searchable(),
                // Tables\Columns\ImageColumn::make('foto'),
                // Tables\Columns\TextColumn::make('genero')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('estado_civil')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('parentesco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('escola.nome')
                //     ->label('Escola')
                //     ->sortable()
                //     ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('rg')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('endereco')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('numero')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('bairro')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('cidade')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('estado')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('cep')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('nacionalidade')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('profissao')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('cargo')
                //     ->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

}
