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
        $permissions_data = ModelsPermission::$data;
        foreach ($permissions_data as $item_idx => $item) {
            $permissions = [];
            foreach ($item['menu'] as $menu_idx => $menu) {
                $permissions = array_merge($permissions, $menu['permissions']);
            }
            foreach ($permissions as $permission_idx => $permission) {
                Permission::updateOrCreate(
                    [
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ],
                    [
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]
                );
            }
        }

        // roles
        $data = [
            [
                'name' => 'super_admin',
                'guard_name' => 'web',
            ],
        ];
        foreach ($data as $key => $value) {
            $user = Role::updateOrCreate(
                [
                    'name' => $value['name'],
                    'guard_name' => $value['guard_name'],
                ],
                [
                    'name' => $value['name'],
                    'guard_name' => $value['guard_name'],
                ]
            );
        }
    }
}
