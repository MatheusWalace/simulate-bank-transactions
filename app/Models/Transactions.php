<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $payer_id
 * @property string $payee_id
 * @property int $amount
 * @property string $currency
 * @property string $status
 * @property string $inconsistency
 * @property string $completed_at
 * @property string $canceled_at
 * @property string $pending_at
 */

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'payer_id',
        'payee_id',
        'amount',
        'currency',
        'inconsistency',
        'status',
        'completed_at',
        'canceled_at',
        'pending_at',
    ];

    public function payer(): BelongsTo
    {
        return $this->belongsTo(MoneyWallet::class, 'payer_id');
    }

    public function payee(): BelongsTo
    {
        return $this->belongsTo(MoneyWallet::class, 'payee_id');
    }
}
