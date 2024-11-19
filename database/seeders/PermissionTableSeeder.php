<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        //satrt artikel
        $artikel_read = Permission::create(['name' => 'artikel-read']);
        $artikel_create = Permission::create(['name' => 'artikel-create']);
        $prdouk_edit = Permission::create(['name' => 'artikel-edit']);
        $artikel_delete = Permission::create(['name' => 'artikel-delete']);
        // End Permission artikel

        $user = Role::create(['name' => 'User']);
        $user->givePermissionTo($artikel_read, $artikel_create);

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo($artikel_read, $artikel_create, $prdouk_edit, $artikel_delete);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $admin->assignRole('Admin');

        $profile = Profile::create([
          'id_user' => $admin->id,
          'nama_lengkap' => 'Admin',
          'jk' => 'waria',
          'tgl' => '1933-03-14',
          'alamat' => 'Newyerk',
          'foto' => 'default.png',
          'agama' => 'ateis',
        ]);
    }
}
