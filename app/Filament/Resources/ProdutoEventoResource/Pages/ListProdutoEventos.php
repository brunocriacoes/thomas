<?php

namespace App\Filament\Resources\ProdutoEventoResource\Pages;

use App\Filament\Resources\ProdutoEventoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdutoEventos extends ListRecords
{
    protected static string $resource = ProdutoEventoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
