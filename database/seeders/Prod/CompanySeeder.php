<?php

namespace Database\Seeders\Prod;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'default_currency_id' => 1,
                'code' => 'pt-testing',
                'name' => 'PT Testing',
                'users' => [
                    [
                        'name' => 'Super Admin',
                        'email' => 'super_admin@example.com',
                        'role_name' => 'super_admin',
                    ],
                ],
            ],
            [
                'default_currency_id' => 1,
                'code' => 'pt-toko',
                'name' => 'PT Toko',
                'users' => [
                    [
                        'name' => 'Admin Toko',
                        'email' => 'admin_toko@example.com',
                        'role_name' => 'admin',
                    ],
                ],
            ],
            [
                'default_currency_id' => 1,
                'code' => 'pt-klinik-hewan',
                'name' => 'PT Klinik Hewan',
                'users' => [],
            ],
        ];

        foreach ($data as $company_key => $company_value) {
            // companies
            $company = Company::updateOrCreate(
                [
                    'code' => $company_value['code'],
                ],
                [
                    'default_currency_id' => $company_value['default_currency_id'],
                    'code' => $company_value['code'],
                    'name' => $company_value['name'],
                ],
            );

            // users
            foreach ($company_value['users'] as $user_key => $user_value) {
                $user = UserSeeder::updateOrCreate([
                    'company_id' => $user_value['company_id'],
                    'name' => $user_value['name'],
                    'email' => $user_value['email'],
                    'role_name' => $user_value['role_name'],
                ]);
            }
        }
    }
}
