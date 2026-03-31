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
                'name' => 'Test User',
                'email' => 'test@example.com',
            ],
            [
                'name' => 'Test User 2',
                'email' => 'test2@example.com',
            ],
        ];

        foreach ($data as $key => $value) {
            $user = User::updateOrCreate(
                [
                    'email' => $value['email'],
                ],
                [
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password' => Hash::make(config('app.password')),
                ]
            );

            if ($key == 0) {
                $user->assignRole('super_admin');
            } elseif ($key == 1) {
                $user->assignRole('super_admin');
            }
        }
    }
}
