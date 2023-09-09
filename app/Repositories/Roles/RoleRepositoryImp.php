<?php

namespace App\Repositories\Roles;

use App\Models\Role;

class RoleRepositoryImp implements RoleRepository
{
    protected $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getRoleByUUID($id)
    {
        return $this->model->where('uuid', $id)->first();
    }
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $role = $this->find($id);
        $role->update($attributes);
        return $role;
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
