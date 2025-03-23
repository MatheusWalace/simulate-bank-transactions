<?php

namespace App\Http\Domain\Repositories;

use App\Http\Domain\Entities\Transactions;
use App\Models\MoneyWallet;
use \App\Models\Transactions as TransactionsModel;
interface TransactionsRepositoryInterface
{
    public function getWalletMoney(int $id): MoneyWallet;
    public function create(Transactions $transactions): TransactionsModel;
}
