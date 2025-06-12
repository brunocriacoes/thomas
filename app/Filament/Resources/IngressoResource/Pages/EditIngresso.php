<?php

namespace App\Filament\Resources\IngressoResource\Pages;

use App\Filament\Resources\IngressoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIngresso extends EditRecord
{
    protected static string $resource = IngressoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
