<?php

namespace App\Filament\Resources\PlanosResource\Widgets;

use Filament\Widgets\ChartWidget;

class TotalPlanos extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
