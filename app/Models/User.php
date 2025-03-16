<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fullName
 * @property string $document
 * @property string $email
 * @property string $password
 * @property string $role
 */

class User extends Model
{
    protected $fillable = [
        'full_name',
        'document',
        'email',
        'password',
        'role'
    ];

    public function moneyWallet()
    {
        return $this->hasOne(MoneyWallet::class);
    }
}
