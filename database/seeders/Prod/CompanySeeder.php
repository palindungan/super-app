<?php

namespace Database\Seeders\Prod;

use App\Models\Branch;
use App\Models\BranchUser;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'branches' => [],
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
                'branches' =>  [
                    [
                        'code' => 'cb-toko-lumajang',
                        'name' => 'Lumajang',
                        'branch_users' => [
                            'admin_toko@example.com',
                        ],
                    ],
                    [
                        'code' => 'cb-toko-kunir',
                        'name' => 'Kunir',
                        'branch_users' => [],
                    ],
                ],
            ],
            [
                'default_currency_id' => 1,
                'code' => 'pt-klinik',
                'name' => 'PT Klinik',
                'users' => [
                    [
                        'name' => 'Admin Klinik',
                        'email' => 'admin_Klinik@example.com',
                        'role_name' => 'admin',
                    ],
                ],
                'branches' =>  [
                    [
                        'code' => 'cb-klinik-surabaya',
                        'name' => 'Surabaya',
                        'branch_users' => [
                            'admin_Klinik@example.com',
                        ],
                    ],
                    [
                        'code' => 'cb-klinik-jember',
                        'name' => 'Jember',
                        'branch_users' => [],
                    ],
                ],
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

            // branches
            foreach ($company_value['branches'] as $branch_key => $branch_value) {
                $branch = Branch::updateOrCreate(
                    [
                        'code' => $branch_value['code'],
                    ],
                    [
                        'company_id' => $company->id,
                        'code' => $branch_value['code'],
                        'name' => $branch_value['name'],
                    ],
                );

                // branch_users
                BranchUser::where('branch_id', $branch->id)->delete();
                foreach ($branch_value['branch_users'] as $branch_user_key => $branch_user_value) {
                    $user = User::where('email', $branch_user_value)->first();
                    $branch_user = BranchUser::create([
                        'branch_id' => $branch->id,
                        'user_id' => $user->id,
                    ]);
                }
            }

            // users
            foreach ($company_value['users'] as $user_key => $user_value) {
                $user = User::updateOrCreate(
                    [
                        'email' => $user_value['email'],
                    ],
                    [
                        'company_id' => $company->id,
                        'name' => $user_value['name'],
                        'email' => $user_value['email'],
                        'password' => Hash::make(config('app.password')),
                    ],
                );
                $user->assignRole($user_value['role_name']);
            }
        }
    }
}
