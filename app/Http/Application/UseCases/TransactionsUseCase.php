<?php

namespace App\Http\Application\UseCases;

use App\Http\Domain\Entities\Transactions;
use App\Http\Domain\Repositories\TransactionsRepositoryInterface;

class TransactionsUseCase
{
    public function __construct(private TransactionsRepositoryInterface $transactionsRepository){}

    public function execute(
        string $payer,
        string $payee,
        float $amount,
        string $currency
    )
    {
        $transactions = new Transactions(
            $payer,
            $payee,
            $amount,
            $currency
        );

        return $this->transactionsRepository->create($transactions);

    }
}
