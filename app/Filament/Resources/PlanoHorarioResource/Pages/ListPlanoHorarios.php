<?php

namespace App\Filament\Resources\PlanoHorarioResource\Pages;

use App\Filament\Resources\PlanoHorarioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlanoHorarios extends ListRecords
{
    protected static string $resource = PlanoHorarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
