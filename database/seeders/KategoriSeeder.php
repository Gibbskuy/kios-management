<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'kategori-read',
            'kategori-create',
            'kategori-edit',
            'kategori-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
