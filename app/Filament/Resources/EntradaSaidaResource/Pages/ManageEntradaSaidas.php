<?php

namespace App\Filament\Resources\EntradaSaidaResource\Pages;

use App\Filament\Resources\EntradaSaidaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEntradaSaidas extends ManageRecords
{
    protected static string $resource = EntradaSaidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
