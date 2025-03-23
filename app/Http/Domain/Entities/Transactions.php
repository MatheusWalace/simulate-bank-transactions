<?php

namespace App\Http\Domain\Entities;

class Transactions
{
    public function __construct(
        public string $payer,
        public string $payee,
        public float $amount,
        public string $currency,
        public string $status,
    ) {}
}
