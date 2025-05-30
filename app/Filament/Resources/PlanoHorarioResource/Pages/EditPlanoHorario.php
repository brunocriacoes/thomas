<?php

namespace App\Filament\Resources\PlanoHorarioResource\Pages;

use App\Filament\Resources\PlanoHorarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanoHorario extends EditRecord
{
    protected static string $resource = PlanoHorarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
