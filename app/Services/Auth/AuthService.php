<?php

namespace App\Services\Auth;

use Illuminate\Support\Collection;

interface AuthService
{
    // Web Services
    public function authenticateLogin(Collection|array $loginDTO);
    public function registerUser(Collection|array $registerDTO);
    public function logoutSession();

    // API Services
    public function authenticateLoginViaAPI(Collection|array $loginDTO);
    public function registerUserViaAPI(Collection|array $registerDTO);
}