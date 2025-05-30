<?php

namespace App\Filament\Resources\ProdutoEventoResource\Pages;

use App\Filament\Resources\ProdutoEventoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdutoEvento extends EditRecord
{
    protected static string $resource = ProdutoEventoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
