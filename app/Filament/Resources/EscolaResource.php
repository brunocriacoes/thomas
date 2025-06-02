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
                    ->required()
                    ->columnSpan(2),
                Forms\Components\FileUpload::make('url_logo')
                    ->nullable()
                    ->image(),
                Forms\Components\FileUpload::make('url_arte')
                    ->nullable()
                    ->image(),
                Forms\Components\TextInput::make('cnpj')
                    ->required()
                    ->mask('99.999.999/9999-99'),
                Forms\Components\TextInput::make('telefone')
                    ->nullable()
                    ->mask('(99) 99999-9999'),
                Forms\Components\TextInput::make('email')
                    ->nullable(),
                Forms\Components\TextInput::make('faturamento')
                    ->numeric()
                    ->nullable(),
                Forms\Components\Select::make('tipo_escola')
                    ->options([
                        'Infantil' => 'Infantil',
                        'Futebol' => 'Futebol',
                        'Futvoley' => 'Futvoley',
                        'Jiu-Jitsu' => 'Jiu-Jitsu',
                        'Natação' => 'Natação',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('url_site')
                    ->nullable(),
                Forms\Components\TextInput::make('url_google_map')
                    ->nullable(),
                Forms\Components\TextInput::make('url_instagran')
                    ->nullable(),
                Forms\Components\Toggle::make('status')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\TextInput::make('cep')
                    ->mask('99999-999')
                    ->nullable(),
                Forms\Components\TextInput::make('endereco')
                    ->nullable(),
                Forms\Components\TextInput::make('numero')
                    ->nullable(),
                Forms\Components\TextInput::make('bairro')
                    ->nullable(),
                Forms\Components\TextInput::make('cidade')
                    ->nullable(),
                Forms\Components\TextInput::make('estado')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('url_logo')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('url_arte')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cnpj')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('faturamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_escola')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url_site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url_google_map')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url_instagran')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('cep')
                    ->searchable(),
                Tables\Columns\TextColumn::make('endereco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bairro')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
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
            'index' => Pages\ListEscolas::route('/'),
            'create' => Pages\CreateEscola::route('/create'),
            'edit' => Pages\EditEscola::route('/{record}/edit'),
        ];
    }
}
