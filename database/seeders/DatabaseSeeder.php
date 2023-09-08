<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MasterData\UserSeeder;
use Database\Seeders\MasterData\PermissionSeeder;
use Database\Seeders\MasterData\UserRolePermissionSeeder;
use Database\Seeders\MasterData\StaffRolePermissionSeeder;
use Database\Seeders\MasterData\SuperAdminRolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            SuperAdminRolePermissionSeeder::class,
            StaffRolePermissionSeeder::class,
            UserRolePermissionSeeder::class,
            UserSeeder::class
        ]);
    }
}
