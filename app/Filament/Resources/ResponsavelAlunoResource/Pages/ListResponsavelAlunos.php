<?php

namespace App\Filament\Resources\ResponsavelAlunoResource\Pages;

use App\Filament\Resources\ResponsavelAlunoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResponsavelAlunos extends ListRecords
{
    protected static string $resource = ResponsavelAlunoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
