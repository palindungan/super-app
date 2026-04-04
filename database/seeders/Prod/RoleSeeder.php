<?php

namespace Database\Seeders\Prod;

use App\Models\Permission as ModelsPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permissions
        $permissions_name = [];
        $permissions_data = ModelsPermission::$data;
        foreach ($permissions_data as $key => $value) {
            $permissions = [];
            foreach ($value['menu'] as $menu_key => $menu_value) {
                $permissions = array_merge($permissions, $menu_value['permissions']);
            }
            foreach ($permissions as $permission_key => $permission_value) {
                Permission::updateOrCreate(
                    [
                        'name' => $permission_value['name'],
                        'guard_name' => $permission_value['guard_name'],
                    ],
                    [
                        'name' => $permission_value['name'],
                        'guard_name' => $permission_value['guard_name'],
                    ]
                );
                $permissions_name[] = $permission_value['name'];
            }
        }
        $permissions_name = array_unique($permissions_name);

        // roles
        $data = [
            [
                'name' => 'super_admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
        ];
        foreach ($data as $key => $value) {
            $role = Role::updateOrCreate(
                $value,
                $value
            );
            $role->syncPermissions($permissions_name ?? []);
        }
    }
}
