<?php


// app/Services/Role/RoleServiceImp.php

namespace App\Services\Roles;

use App\Repositories\Roles\RoleRepository;
use App\Services\Roles\RoleService;

class RoleServiceImp implements RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getRoleByUUID($id){
        return $this->roleRepository->getRoleByUUID($id);
    }

    public function getAllRoles()
    {
        return $this->roleRepository->all();
    }

    public function getRoleById($id)
    {
        return $this->roleRepository->find($id);
    }

    public function createRole(array $data)
    {
        return $this->roleRepository->create($data);
    }

    public function updateRole($id, array $data)
    {
        return $this->roleRepository->update($id, $data);
    }

    public function deleteRole($id)
    {
        return $this->roleRepository->delete($id);
    }
}
