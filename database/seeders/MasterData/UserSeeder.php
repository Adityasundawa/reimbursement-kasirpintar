<?php

namespace Database\Seeders\MasterData;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    // Ambil UUID untuk masing-masing role dari tabel roles
    $direktorId = Role::where('name', 'direktur')->first()->uuid;
    $financeId = Role::where('name', 'finance')->first()->uuid;
    $staffId = Role::where('name', 'staff')->first()->uuid;


    \App\Models\User::factory()->create([
        'name' => 'Direktur',
        'email' => 'direktur@mail.com',
        'password' => Hash::make('direktur@mail.com'),
        'role_id' => $direktorId,
    ]);

    \App\Models\User::factory()->create([
        'name' => 'Finance',
        'email' => 'finance@mail.com',
        'password' => Hash::make('finance@mail.com'),
        'role_id' => $financeId,
    ]);

    \App\Models\User::factory()->create([
        'name' => 'Staff',
        'email' => 'staff@mail.com',
        'password' => Hash::make('staff@mail.com'),
        'role_id' => $staffId,
    ]);

}
}
