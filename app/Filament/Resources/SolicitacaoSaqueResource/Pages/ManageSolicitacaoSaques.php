<?php

namespace App\Filament\Resources\SolicitacaoSaqueResource\Pages;

use App\Filament\Resources\SolicitacaoSaqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSolicitacaoSaques extends ManageRecords
{
    protected static string $resource = SolicitacaoSaqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
