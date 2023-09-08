<?php

namespace Database\Seeders\MasterData;

use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_name = 'direktur';

        $permissions = [
            'manage direktur',
        ];

        $insertedRole = Role::create([
            'name' => $role_name
        ]);

        collect($permissions)->each(function ($permission) use ($insertedRole){
            $permissionInDatabase = Permission::where('name', $permission)->first();
            if(!is_null($permissionInDatabase)) RolePermission::create(['role_id' => $insertedRole->uuid, 'permission_id' => $permissionInDatabase->uuid]);
        });

    }
}
