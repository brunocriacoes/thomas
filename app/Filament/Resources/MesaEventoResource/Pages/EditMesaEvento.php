<?php

namespace App\Filament\Resources\MesaEventoResource\Pages;

use App\Filament\Resources\MesaEventoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMesaEvento extends EditRecord
{
    protected static string $resource = MesaEventoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
