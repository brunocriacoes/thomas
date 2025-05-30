<?php

namespace App\Filament\Resources\ResponsavelAlunoResource\Pages;

use App\Filament\Resources\ResponsavelAlunoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResponsavelAluno extends EditRecord
{
    protected static string $resource = ResponsavelAlunoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
