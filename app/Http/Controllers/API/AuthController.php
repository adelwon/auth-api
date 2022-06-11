<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSigninRequest;
use App\Http\Requests\UserSignupRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function signup(UserSignupRequest $request): JsonResponse
    {
        $user = User::query()->createFromDTO($request->getUserSignupDTO());

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(
            [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ],
            Response::HTTP_CREATED
        );
    }

    public function auth(UserSigninRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {

            return response()->json([
                'message' => trans('auth.failed')
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = User::query()->where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => trans('auth.logout')
        ]);
    }
}
