<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar nama permission untuk content
        $permissions = ['content-read', 'content-create', 'content-edit', 'content-delete'];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(
                ['name' => $permissionName, 'guard_name' => 'web']
            );
        }

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo($permissions); // bisa langsung array
    }
}
