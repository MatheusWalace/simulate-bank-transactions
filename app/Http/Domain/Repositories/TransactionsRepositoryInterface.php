<?php

namespace App\Http\Domain\Repositories;

use App\Http\Domain\Entities\Transactions;

interface TransactionsRepositoryInterface
{
    public function create(Transactions $transactions): bool;
}
