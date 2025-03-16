<?php
namespace App\Http\Application\UseCases;

use App\Http\Domain\Entities\User;
use App\Http\Domain\Repositories\UserRepositoryInterface;
use App\Models\User as UserModel;

class CreateUserUseCase
{
    public function __construct(private UserRepositoryInterface $userRepository) {}

    public function execute(
        string $fullName,
        string $document,
        string $email,
        string $password,
        string $role,
        int $amount,
        string $currency
    ): UserModel
    {
        $user = new User(
            $fullName,
            $document,
            $email,
            $password,
            $role,
        );

        $user->wallet(amount: $amount, currency: $currency);

        return $this->userRepository->create($user);
    }
}
