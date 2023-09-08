<?php

namespace Database\Seeders\MasterData;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage direktur',
            'manage finance',
            'manage staff',
        ];

        collect($permissions)->each(fn ($permission) => Permission::create(['name' => $permission]));
    }
}
