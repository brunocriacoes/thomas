<?php

namespace App\Filament\Resources\HistoricoMensalidadeResource\Pages;

use App\Filament\Resources\HistoricoMensalidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoricoMensalidades extends ListRecords
{
    protected static string $resource = HistoricoMensalidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
