<?php

namespace Database\Seeders\Prod;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public static function updateOrCreate($param = [])
    {
        $user = User::updateOrCreate(
            [
                'email' => $param['email'],
            ],
            [
                'company_id' => $param['company_id'],
                'name' => $param['name'],
                'email' => $param['email'],
                'password' => Hash::make(config('app.password')),
            ]
        );

        $user->assignRole($param['role_name']);
    }
}
