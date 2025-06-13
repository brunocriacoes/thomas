<?php

namespace App\Filament\Resources\MeioPagamentoResource\Pages;

use App\Filament\Resources\MeioPagamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMeioPagamento extends EditRecord
{
    protected static string $resource = MeioPagamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
