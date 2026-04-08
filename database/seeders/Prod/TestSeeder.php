<?php

namespace Database\Seeders\Prod;

use App\Models\AssetCategory;
use App\Models\AssetStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Elektronik',
            ],
            [
                'name' => 'Furnitur',
            ],
            [
                'name' => 'Kendaraan',
            ],
        ];
        foreach ($data as $key => $value) {
            $asset_category = AssetCategory::updateOrCreate(
                [
                    'name' => $value['name'],
                ],
                $value,
            );
        }

        $data = [
            [
                'name' => 'Tersedia',
            ],
            [
                'name' => 'Dipinjam',
            ],
            [
                'name' => 'Rusak',
            ],
        ];
        foreach ($data as $key => $value) {
            $asset_status = AssetStatus::updateOrCreate(
                [
                    'name' => $value['name'],
                ],
                $value,
            );
        }
    }
}
