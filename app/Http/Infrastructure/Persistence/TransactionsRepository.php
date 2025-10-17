<?php

namespace App\Http\Infrastructure\Persistence;

use App\Http\Domain\Entities\Transactions;
use App\Http\Domain\Repositories\TransactionsRepositoryInterface;
use App\Models\MoneyWallet;
use App\Models\Transactions as TransactionsModel;
use App\Models\User;

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

    public function getTransactions(string $document)
    {
        return User::where('document', $document)
            ->with([
                'moneyWallet',
                'moneyWallet.setPayerTransactions' => function ($query) {
                    $query->orderByDesc('created_at');
                }
            ])
            ->first();
    }
}
