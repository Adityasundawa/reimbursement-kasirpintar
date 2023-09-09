<?php

namespace App\Services\User;
use Illuminate\Support\Collection;
use App\Models\User;

interface UserService
{

    public function getAllUsers();

    public function getUserById($id);

    public function createUser(array $attributes);

    public function updateUser($id, array $attributes);

    public function deleteUser($id);

    public function getAllRoles();
}
