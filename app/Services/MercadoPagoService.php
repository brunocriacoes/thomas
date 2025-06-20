<?php

namespace App\Services;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use Illuminate\Support\Facades\Log;

class MercadoPagoService
{
    protected PreferenceClient $client;

    public function __construct()
    {
        MercadoPagoConfig::setAccessToken(config('services.mercado_pago.access_token'));

        $this->client = new PreferenceClient();
    }

    public function criarPreferencia(string $descricao, float $valor, string $formaPagamento = 'pix'): object
    {
        $items = [
            [
                'title' => $descricao,
                'quantity' => 1,
                'unit_price' => $valor,
            ]
        ];

        $payment_methods = [];

        if ($formaPagamento === 'pix') {
            $payment_methods['excluded_payment_types'] = [['id' => 'credit_card']];
        } elseif ($formaPagamento === 'cartao') {
            $payment_methods['excluded_payment_types'] = [
                ['id' => 'pix'],
                ['id' => 'ticket'],
                ['id' => 'bank_transfer'],
                ['id' => 'atm'],
            ];
        }

        $preferenceData = [
            'items' => $items,
            'payment_methods' => $payment_methods,
            'back_urls' => [
                // 'success' => route('pagamento.sucesso'),
                // 'failure' => route('pagamento.falha'),
                // 'pending' => route('pagamento.pendente'),
                
                'success' => "https://bekburitis.com.br/thankyou",
                'failure' => "https://bekburitis.com.br/thankyou",
                'pending' => "https://bekburitis.com.br/thankyou",
            ],
            'auto_return' => 'approved',
        ];

        try {
            return $this->client->create($preferenceData);
        } catch (\MercadoPago\Exceptions\MPApiException $e) {
            Log::error('MercadoPago - Erro ao criar preferência', [
                'preferenceData' => $preferenceData,
                'api_response' => $e->getApiResponse(),
                'exception' => $e,
            ]);
            throw new \Exception(
                'Erro ao criar preferência MercadoPago: ' . $e->getMessage() .
                "\nResposta da API:\n" . print_r($e->getApiResponse(), true)
            );
        }
    }
}
