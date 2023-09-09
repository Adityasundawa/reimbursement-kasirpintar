<?php

namespace App\Repositories\Roles;

interface RoleRepository
{
    public function all();

    public function find($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);

    public function getRoleByUUID($id);
}
