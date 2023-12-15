<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-prescriptions']);
        Permission::create(['name' => 'view-prescriptions']);

        // $role = Role::create(['name' => 'customer']);
        // $permission = Permission::findByName('create-prescription');
        // $role->givePermissionTo($permission);

        // $user = User::find(); 
        // $user->assignRole('customer');
    }
}
