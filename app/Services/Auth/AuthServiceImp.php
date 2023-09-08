<?php

namespace App\Services\Auth;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Response\JsonResponse;
use App\Helpers\Response\ObjectResponse;
use App\Repositories\User\UserRepository;

class AuthServiceImp implements AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticateLogin(Collection|array $loginDTO)
    {
        if (Auth::attempt($loginDTO)) {
            $user = $this->userRepository->findOneByNip($loginDTO['nip']);
            request()->session()->regenerate();

            return ObjectResponse::success('Successfully Log In!', 200, $user);

        }

        return ObjectResponse::error('Incorrect Username / password, please check your Username / Passworod again!', 404, 'Password doesn\'t match!');

    }

    public function registerUser(Collection|array $registerDTO)
    {
        DB::beginTransaction();
        try {
            $registerDTO['password'] = Hash::make($registerDTO['password']);
            $createdUser = $this->userRepository->create($registerDTO);
            $userToken = $createdUser->createToken('auth_token')->plainTextToken;

            DB::commit();
            return JsonResponse::token($userToken, $createdUser);
        } catch (\Throwable $th) {
            DB::rollback();
            return JsonResponse::error('Something went wrong from the server side!', 500, $th);
        }
    }

    public function logoutSession()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return ObjectResponse::success('Logout berhasil!', 200);
    }

    public function authenticateLoginViaAPI(Collection|array $loginDTO)
    {
        if (Auth::attempt($loginDTO)) {
            $user = $this->userRepository->findOneByEmail($loginDTO['email']);
            $userToken = $user->createToken('auth_token')->plainTextToken;

            return JsonResponse::token($userToken, $user);
        }

        return JsonResponse::error('Incorrect password, please check your password again!', 404, 'Password doesn\'t match!');

    }

    public function registerUserViaAPI(Collection|array $registerDTO)
    {
        DB::beginTransaction();
        try {
            $registerDTO['password'] = Hash::make($registerDTO['password']);
            $createdUser = $this->userRepository->create($registerDTO);
            $userToken = $createdUser->createToken('auth_token')->plainTextToken;

            DB::commit();
            return JsonResponse::token($userToken, $createdUser);
        } catch (\Throwable $th) {
            DB::rollback();
            return JsonResponse::error('Something went wrong from the server side!', 500, $th);
        }
    }

}
