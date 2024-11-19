<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //start kategori
        $kategori_read = Permission::create(['name' => 'kategori-read']);
        $kategori_create = Permission::create(['name' => 'kategori-create']);
        $kategori_edit = Permission::create(['name' => 'kategori-edit']);
        $kategori_delete = Permission::create(['name' => 'kategori-delete']);
        // End Permission kategori

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo($kategori_read, $kategori_create, $kategori_edit, $kategori_delete);

        $user = Role::firstOrCreate(['name' => 'User']);
        $user->givePermissionTo($kategori_read);

    }
}
