<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        // === Buat permission artikel (dengan firstOrCreate)
        $artikel_read   = Permission::firstOrCreate(['name' => 'artikel-read', 'guard_name' => 'web']);
        $artikel_create = Permission::firstOrCreate(['name' => 'artikel-create', 'guard_name' => 'web']);
        $artikel_edit   = Permission::firstOrCreate(['name' => 'artikel-edit', 'guard_name' => 'web']);
        $artikel_delete = Permission::firstOrCreate(['name' => 'artikel-delete', 'guard_name' => 'web']);

        // === Buat Role User & Admin
        $userRole = Role::firstOrCreate(['name' => 'User']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // === Assign permission ke role
        $userRole->syncPermissions([$artikel_read, $artikel_create]);
        $adminRole->syncPermissions([$artikel_read, $artikel_create, $artikel_edit, $artikel_delete]);

        // === Buat user admin (hanya jika belum ada)
        $admin = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        $admin->assignRole($adminRole);

        // === Buat profile admin
        Profile::firstOrCreate([
            'id_user' => $admin->id,
        ], [
            'nama_lengkap' => 'Admin',
            'jk' => 'waria',
            'tgl' => '1933-03-14',
            'alamat' => 'Newyerk',
            'foto' => 'default.png',
            'agama' => 'ateis',
        ]);
    }
}
