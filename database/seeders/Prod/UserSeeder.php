<?php

namespace Database\Seeders\Prod;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'company_id' => 1,
                'name' => 'Super Admin',
                'email' => 'super_admin@example.com',
                'role_name' => 'super_admin',
            ],
            [
                'company_id' => 2,
                'name' => 'Admin Toko',
                'email' => 'admin_toko@example.com',
                'role_name' => 'admin',
            ],
        ];

        foreach ($data as $key => $value) {
            $user = User::updateOrCreate(
                [
                    'email' => $value['email'],
                ],
                [
                    'company_id' => $value['company_id'],
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password' => Hash::make(config('app.password')),
                ]
            );

            $user->assignRole($value['role_name']);
        }
    }
}
