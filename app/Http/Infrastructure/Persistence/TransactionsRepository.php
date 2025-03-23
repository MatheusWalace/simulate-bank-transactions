<?php

namespace App\Http\Infrastructure\Persistence;

use App\Http\Domain\Entities\Transactions;
use App\Http\Domain\Repositories\TransactionsRepositoryInterface;
use App\Models\MoneyWallet;
use App\Models\Transactions as TransactionsModel;

class TransactionsRepository implements TransactionsRepositoryInterface
{
    public function getWalletMoney(int $id): MoneyWallet
    {
        return MoneyWallet::where('user_id', $id)->first();
    }
    public function create(Transactions $transactions): TransactionsModel
    {
        $transactions = TransactionsModel::create([
            'payer_id' => $transactions->payer,
            'payee_id' => $transactions->payee,
            'amount' => $transactions->amount,
            'currency' => $transactions->currency,
            'status' => $transactions->status
        ]);

        return $transactions;
    }
}
