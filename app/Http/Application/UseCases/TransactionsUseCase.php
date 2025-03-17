<?php

namespace App\Http\Application\UseCases;

class TransactionsUseCase
{
    public function __construct()
    {
    }

    public function execute(
        string $payer,
        string $payee,
        float $amount,
        string $currency
    )
    {

    }
}
