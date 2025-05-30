<?php

namespace App\Filament\Resources\MesaEventoResource\Pages;

use App\Filament\Resources\MesaEventoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMesaEventos extends ListRecords
{
    protected static string $resource = MesaEventoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
