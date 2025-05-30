<?php

namespace App\Filament\Resources\CompraItemResource\Pages;

use App\Filament\Resources\CompraItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCompraItems extends ManageRecords
{
    protected static string $resource = CompraItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
