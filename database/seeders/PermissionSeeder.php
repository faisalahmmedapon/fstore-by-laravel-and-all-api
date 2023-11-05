<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // default permission from here
            'dashboard',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'setting-list',
            'setting-create',
            'setting-edit',
            'setting-delete',
            // all permission from here
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }
    }
}
