<?php

namespace App\Http\Controllers;

use App\Http\Application\UseCases\TransactionsUseCase;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransactionController extends Controller
{
    public function __construct(private TransactionsUseCase $transactionsUseCase) {}
    public function store(Request $request)
    {
        $data = $request->validate([
            'payer' => 'required|string',
            'payee' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string|in:USD,BRL',
        ]);

        $transaction = $this->transactionsUseCase->execute(
            payer: $data['payer'],
            payee: $data['payee'],
            amount: $data['amount'],
            currency: $data['currency'],
        );

        return response()->json([
            'payer_id' => $transaction->payer_id,
            'payee_id' => $transaction->payee_id,
            'amount' => $transaction->amount,
            'currency' => $transaction->currency,
            'status' => $transaction->status,
            'inconsistency' => $transaction->inconsistency,
            'completed_at' => $transaction->completed_at,
            'canceled_at' => $transaction->canceled_at,
            'pending_at' => $transaction->pending_at,
        ], 201);
    }
}
