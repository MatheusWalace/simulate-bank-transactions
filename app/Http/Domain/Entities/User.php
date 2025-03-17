<?php
namespace App\Http\Domain\Entities;

class User
{
    public function __construct(
        public string $fullName,
        public string $document,
        public string $email,
        public string $password,
        public string $role,
        public array $wallet = []
    ) {}
    public function wallet(int $amount, string $currency): void
    {
        $this->wallet = [
            'amount' => $amount,
            'currency' => $currency,
        ];
    }
}
