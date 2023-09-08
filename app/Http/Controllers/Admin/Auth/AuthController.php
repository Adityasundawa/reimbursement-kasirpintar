<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function viewLogin()
    {
        return view('pages.auth.login');
    }

    public function authenticateLogin(LoginRequest $request)
    {
        $data = $request->validated();
        $authResponse = $this->authService->authenticateLogin($data);

        if ($authResponse->success) {
            // Setelah berhasil login, arahkan pengguna berdasarkan role mereka
            $user = auth()->user(); // mendapatkan user yang sedang login

            if ($user->hasRole('direktur')) {
                return redirect()->route('direktur.dashboard')->with('toastSuccess', $authResponse->message);
            } elseif ($user->hasRole('finance')) {
                return redirect()->route('finance.dashboard')->with('toastSuccess', $authResponse->message);
            } elseif ($user->hasRole('staff')) {
                return redirect()->route('staff.dashboard')->with('toastSuccess', $authResponse->message);
            }

            // Default redirection jika user tidak memiliki role khusus
            return redirect()->intended('/dashboard')->with('toastSuccess', $authResponse->message);
        } else {
            return back()->with('toastError', $authResponse->message)->withInput();
        }
    }


    public function logout()
    {
        $authResponse = $this->authService->logoutSession();
        return redirect('/login')->with('toastSuccess', $authResponse->message);
    }
}
