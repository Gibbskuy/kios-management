<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //start content
        $content_read = Permission::create(['name' => 'content-read']);
        $content_create = Permission::create(['name' => 'content-create']);
        $content_edit = Permission::create(['name' => 'content-edit']);
        $content_delete = Permission::create(['name' => 'content-delete']);
        // End Permission content

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo($content_read, $content_create, $content_edit, $content_delete);

    }
}
