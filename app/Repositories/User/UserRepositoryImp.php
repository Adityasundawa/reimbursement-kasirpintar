<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepositoryImp extends BaseRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findOneByEmail(string $email): User
    {
        return $this->model->where('email', $email)->first();
    }
    
    public function findOneByNip(string $nip): ?User
{
    return User::where('nip', $nip)->first();
}


}
