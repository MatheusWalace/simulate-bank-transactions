<?php
namespace App\Http\Infrastructure\Persistence;

use App\Http\Domain\Entities\User as UserEntity;
use App\Http\Domain\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  public function create(UserEntity $user): User
  {
    return User::create([
      'full_name' => $user->fullName,
      'document' => $user->document,
      'email' => $user->email,
      'password' => $user->password,
      'role' => $user->role
    ]);
  }
}
