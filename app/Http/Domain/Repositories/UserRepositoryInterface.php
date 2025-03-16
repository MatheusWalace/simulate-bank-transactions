<?php
namespace App\Http\Domain\Repositories;

use App\Http\Domain\Entities\User;

interface UserRepositoryInterface
{
   public function create(User $user): \App\Models\User;
}
