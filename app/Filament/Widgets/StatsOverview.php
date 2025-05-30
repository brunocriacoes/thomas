<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Aluno;
use App\Models\Escola;
use App\Models\ResponsavelAluno;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de alunos', Aluno::all()->count()),
            Stat::make('Total de escolas', Escola::all()->count()),
            Stat::make('Total responsaveis', ResponsavelAluno::all()->count()),
        ];
    }
}
