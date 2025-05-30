<?php

namespace App\Filament\Resources\CompraEventoResource\Pages;

use App\Filament\Resources\CompraEventoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCompraEventos extends ManageRecords
{
    protected static string $resource = CompraEventoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
