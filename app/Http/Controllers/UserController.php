<?php

namespace App\Http\Controllers;

use App\Http\Application\UseCases\CreateUserUseCase;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function __construct(private CreateUserUseCase $createUserUseCase) {}

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'document' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|string',
            'wallet.amount' => 'required|numeric',
            'wallet.currency' => 'required|string|in:USD,BRL',
        ]);

        $user = $this->createUserUseCase->execute(
            fullName: $data['full_name'],
            document: $data['document'],
            email: $data['email'],
            password: $data['password'],
            role: $data['role'],
            amount: $data['wallet']['amount'],
            currency: $data['wallet']['currency'],
        );

        return response()->json([
            'full_name' => $user->full_name,
            'document' => $user->document,
            'email' => $user->email,
            'password' => $user->password,
            'role' => $user->role,
            'wallet' => [
                'amount' => $user->moneyWallet()->first()->amount,
                'currency' => $user->moneyWallet()->first()->currency,
            ],
        ], 201);
    }
}

