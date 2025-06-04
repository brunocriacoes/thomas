<?php

namespace App\Filament\Resources\MensalidadeResource\Pages;

use App\Filament\Resources\MensalidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMensalidades extends ListRecords
{
    protected static string $resource = MensalidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
