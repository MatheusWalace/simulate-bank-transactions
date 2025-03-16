<?php
namespace App\Http\Application\UseCases;

use App\Http\Domain\Entities\User;
use App\Http\Domain\Repositories\UserRepositoryInterface;
use App\Models\User as UserModel;

class CreateUserUseCase
{
    public function __construct(private UserRepositoryInterface $userRepository) {}

    public function execute(
        string $full_name,
        string $document,
        string $email,
        string $password,
        string $role
    ): UserModel
    {
        $user = new User(
            $full_name,
            $document,
            $email,
            $password,
            $role
        );

        return $this->userRepository->create($user);
    }
}
