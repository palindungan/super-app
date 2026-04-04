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
            $company = Company::updateOrCreate(
                ['code' => $company_value['code']],
                $company_value
            );
        }
    }
}
