<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment(['local', 'staging'])) {
            $this->call([
                \Database\Seeders\Prod\UserSeeder::class,
            ]);
        }
        if (App::environment(['production'])) {
            $this->call([
                \Database\Seeders\Prod\UserSeeder::class,
            ]);
        }
    }
}
