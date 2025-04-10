<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Start Permission admin
        $admin_read = Permission::firstOrCreate([
            'name' => 'admin-read',
            'guard_name' => 'web',
        ]);

        $admin_create = Permission::firstOrCreate([
            'name' => 'admin-create',
            'guard_name' => 'web',
        ]);

        $admin_edit = Permission::firstOrCreate([
            'name' => 'admin-edit',
            'guard_name' => 'web',
        ]);

        $admin_delete = Permission::firstOrCreate([
            'name' => 'admin-delete',
            'guard_name' => 'web',
        ]);
        // End Permission admin

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo($admin_read, $admin_create, $admin_edit, $admin_delete);
    }
}
