<?php

// app/Services/Role/RoleService.php

namespace App\Services\Roles;

interface RoleService
{
    public function getAllRoles();

    public function getRoleById($id);

    public function getRoleByUUID($id);


    public function createRole(array $data);

    public function updateRole($id, array $data);

    public function deleteRole($id);
}
