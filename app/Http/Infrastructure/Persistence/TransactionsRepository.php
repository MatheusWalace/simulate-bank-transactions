<?php

namespace App\Http\Infrastructure\Persistence;

use App\Http\Domain\Entities\Transactions;
use App\Http\Domain\Repositories\TransactionsRepositoryInterface;

class TransactionsRepository implements TransactionsRepositoryInterface
{
    public function create(Transactions $transactions)
    {
        $transactions = Transactions::create([
            'payer' => $transactions->payer,
            'payee' => $transactions->payee,
            'amount' => $transactions->amount,
            'currency' => $transactions->currency
        ]);


    }
}
