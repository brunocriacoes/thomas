<?php

namespace App\Filament\Resources\HistoricoMensalidadeResource\Pages;

use App\Filament\Resources\HistoricoMensalidadeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistoricoMensalidade extends EditRecord
{
    protected static string $resource = HistoricoMensalidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
