<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Helpers\Response\JsonResponse;
use App\Http\Requests\Api\Auth\LoginRequest as ApiLoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest as ApiRegisterRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(ApiRegisterRequest $request)
    {
        $registerDTO = $request->validated();
        return $this->authService->registerUserViaAPI($registerDTO);
    }

    public function login(ApiLoginRequest $request)
    {
        $loginDTO = $request->validated();
        return $this->authService->authenticateLoginViaAPI($loginDTO);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return JsonResponse::success("Successfully Logout!", 200);
    }
}
