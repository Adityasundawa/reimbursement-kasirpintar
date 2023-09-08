<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepository
{
    public function findOneByEmail(string $email): User;
    public function findOneByNip(string $nip): ?User;

}
