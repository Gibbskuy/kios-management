<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //start admin
        $admin_read = Permission::create(['name' => 'admin-read']);
        $admin_create = Permission::create(['name' => 'admin-create']);
        $admin_edit = Permission::create(['name' => 'admin-edit']);
        $admin_delete = Permission::create(['name' => 'admin-delete']);
        // End Permission admin

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo($admin_read, $admin_create, $admin_edit, $admin_delete);

    }
}
