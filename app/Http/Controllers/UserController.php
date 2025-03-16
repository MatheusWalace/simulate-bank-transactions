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
            'role' => 'required|string'
        ]);

        $user = $this->createUserUseCase->execute(
            full_name: $data['full_name'],
            document: $data['document'],
            email: $data['email'],
            password: $data['password'],
            role: $data['role']
        );

        return response()->json(['user' => $user], 201);
    }
}

