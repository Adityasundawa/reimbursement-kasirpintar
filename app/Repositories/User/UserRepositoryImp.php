<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class UserRepositoryImp extends BaseRepository implements UserRepository
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findOneByEmail(string $email): User
    {
        return $this->model->where('email', $email)->firstOrFail();
    }

    public function findOneByNip(string $nip): ?User
    {
        return $this->model->where('nip', $nip)->first();
    }

    public function all(): Collection
    {
       return $this->model->with('role')->get();
    }

    public function find($id): ?User
    {
        return $this->model->find($id);
    }

    public function create(Collection|array $dto)
    {
        return $this->model->create($dto);
    }

    public function update($id, array $attributes): bool
    {
        $user = $this->find($id);
        if ($user) {
            return $user->update($attributes);
        }
        return false;
    }

    public function delete($id): bool
    {
        return $this->model->destroy($id) > 0;
    }
}
