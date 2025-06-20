<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use App\Services\MercadoPagoService;
use Filament\Notifications\Notification;

class PagamentoIngresso extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $ingresso_id;
    public $forma_pagamento = 'pix';
    public $valor;

    protected static ?string $navigationGroup = 'Pagamentos';
    protected static ?string $navigationLabel = 'Pagamento de Ingresso';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static string $view = 'filament.pages.pagamento-ingresso';

    public function mount(): void
    {
        $this->ingresso_id = request()->query('ingresso_id');

        if ($this->ingresso_id) {
            $ingresso = \App\Models\Ingresso::find($this->ingresso_id);
            if ($ingresso) {
                $this->valor = $ingresso->preco * $ingresso->quantidade;
            } else {
                $this->valor = 0;
            }
        } else {
            $this->valor = 0;
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Radio::make('forma_pagamento')
                ->label('Forma de Pagamento')
                ->options([
                    'pix' => 'Pix',
                    'cartao' => 'Cartão de Crédito',
                ])
                ->required(),

            TextInput::make('valor')
                ->label('Valor a pagar (R$)')
                ->disabled()
                ->numeric(),
        ];
    }

    public function submit(MercadoPagoService $mp)
    {
        $ingresso = \App\Models\Ingresso::find($this->ingresso_id);

        if (!$ingresso) {
            Notification::make()
                ->title('Ingresso não encontrado.')
                ->danger()
                ->send();
            return;
        }

        // Aqui você poderia customizar a preferência para pix ou cartão,
        // mas o Mercado Pago geralmente detecta a melhor opção pelo checkout.

        $preference = $mp->criarPreferencia('Ingresso Evento #' . $ingresso->evento_id, $this->valor);

        return redirect()->to($preference->init_point);
    }
}
