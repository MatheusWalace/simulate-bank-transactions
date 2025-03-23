<?php

namespace App\Http\Application\UseCases;

use App\Http\Domain\Entities\Transactions;
use App\Http\Domain\Repositories\TransactionsRepositoryInterface;
use Exception;

class TransactionsUseCase
{
    public function __construct(private TransactionsRepositoryInterface $transactionsRepository){}

    /**
     * @throws Exception
     */
    public function execute(
        string $payer,
        string $payee,
        int $amount,
        string $currency
    )
    {
        if (!$payer) {
            throw new Exception('Payer not found');
        }

        $payerWallet = $this->transactionsRepository->getWalletMoney($payer);
        if ($payerWallet->amount < $amount) {
            throw new Exception('Insufficient funds');
        }

        $payerWallet->amount -= $amount;
        $payerWallet->save();

        $payeeWallet = $this->transactionsRepository->getWalletMoney($payee);
        $payeeWallet->amount += $amount;
        $payeeWallet->save();

        $transactions = new Transactions(
            $payer,
            $payee,
            $amount,
            $currency,
            $status = 'completed',
        );

        return $this->transactionsRepository->create($transactions);

    }
}
