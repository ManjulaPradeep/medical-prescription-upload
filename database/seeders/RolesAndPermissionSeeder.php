<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-prescriptions']);
        Permission::create(['name' => 'view-prescriptions']);
        Permission::create(['name' => 'create-quotation']);
        Permission::create(['name' => 'view-quotation']);
        Permission::create(['name' => 'accept-quotation']);
        Permission::create(['name' => 'reject-quotation']);
        Permission::create(['name' => 'create-notification']);
        Permission::create(['name' => 'view-notification']);
        Permission::create(['name' => 'create-mail']);
        Permission::create(['name' => 'send-mail']);

        //Default permissions
        $customer = Role::create(['name' => 'customer']);
        $customer->givePermissionTo([
            'create-prescriptions',
            'view-prescriptions',
            'view-quotation',
            'accept-quotation',
            'reject-quotation',
            'view-notification'
        ]);

        $staff = Role::create(['name' => 'staff']);
        $staff->givePermissionTo([
            'view-prescriptions',
            'create-quotation',
            'view-quotation',
            'create-notification',
            'create-mail',
            'send-mail'
        ]);
    }
}
