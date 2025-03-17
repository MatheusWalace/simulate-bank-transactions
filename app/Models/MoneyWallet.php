<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $userid
 * @property int $amount
 * @property string $currency
 */

class MoneyWallet extends Model
{
    protected $table = 'money_wallet';
    protected $fillable = [
        'user_id',
        'amount',
        'currency'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setPayerTransactions(): HasMany
    {
        return $this->hasMany(Transactions::class, 'payer_id');
    }

    public function setPayeeTransactions(): HasMany
    {
        return $this->hasMany(Transactions::class, 'payee_id');
    }
}
