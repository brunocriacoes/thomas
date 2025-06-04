<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoricoMensalidadeResource\Pages;
use App\Filament\Resources\HistoricoMensalidadeResource\RelationManagers;
use App\Models\HistoricoMensalidade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoricoMensalidadeResource extends Resource
{
    protected static ?string $model = HistoricoMensalidade::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Cadastro da escola';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('escola_id')
                    ->relationship('escola', 'nome')
                    ->required(),

                Forms\Components\Select::make('mensalidade_id')
                    ->relationship('mensalidade', 'valor')
                    ->required(),

                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('data_vencimento')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'A_VENCER' => 'A vencer',
                        'PAGA' => 'Paga',
                        'VENCIDA' => 'Vencida',
                        'CANCELADA' => 'Cancelada',
                    ]),
                Forms\Components\TextInput::make('codigo_referencia'),
                Forms\Components\TextInput::make('pagamento_id')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('escola_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mensalidade_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_vencimento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_referencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pagamento_id')
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
            'index' => Pages\ListHistoricoMensalidades::route('/'),
            'create' => Pages\CreateHistoricoMensalidade::route('/create'),
            'edit' => Pages\EditHistoricoMensalidade::route('/{record}/edit'),
        ];
    }
}
