<?php

namespace App\Helpers\Model;

use App\Models\RolePermission;

trait HasRole
{
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'uuid', 'role_id');
    }

    public function hasRole($role)
    {
        return $this->role->name == $role;
    }

    public function hasPermission(string $permission): bool
    {
        return RolePermission::where('role_id', $this->role_id)->whereHas('permission', function ($query) use ($permission){
            $query->where('name', $permission);
        })->get()->count() > 0;
    }
}