<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
