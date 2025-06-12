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
                Forms\Components\FileUpload::make('url_foto_evento')
                    ->image()
                    ->columnSpan(2),
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\RichEditor::make('descricao')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('data_inicio'),
                Forms\Components\DatePicker::make('data_final'),
                Forms\Components\TextInput::make('horario_inicio'),
                Forms\Components\TextInput::make('horario_final'),
                Forms\Components\TextInput::make('telefone')
                    ->tel()
                    ->columnSpan(2),
                
                Forms\Components\FileUpload::make('url_foto_evento_mesa')
                    ->image()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('link_google_map'),
                Forms\Components\TextInput::make('link_caralogo'),
                Forms\Components\RichEditor::make('scrip_js')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola.nome')
                    ->label('Escola')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_final')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('horario_inicio'),
                Tables\Columns\TextColumn::make('horario_final'),
                Tables\Columns\TextColumn::make('telefone')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('url_foto_evento'),
                Tables\Columns\ImageColumn::make('url_foto_evento_mesa'),
                Tables\Columns\TextColumn::make('link_google_map')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_caralogo')
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
            'index' => Pages\ListEventos::route('/'),
            'create' => Pages\CreateEvento::route('/create'),
            'edit' => Pages\EditEvento::route('/{record}/edit'),
        ];
    }
}
