<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create_users',
            'edit_users',
            'delete_users',
            'view_users',
            'create_roles',
            'edit_roles',
            'delete_roles',
            'view_roles',
            'create_permissions',
            'edit_permissions',
            'delete_permissions',
            'view_permissions',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission], ['guard_name' => 'admin']);
        }
    }
}
