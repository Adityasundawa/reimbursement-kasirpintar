<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepository
{
    public function findOneByEmail(string $email): User;
    public function findOneByNip(string $nip): ?User;

    public function all();

    public function find($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}
