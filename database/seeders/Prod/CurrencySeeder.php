<?php

namespace Database\Seeders\Prod;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'IDR',
                'name' => 'Indonesian Rupiah',
                'symbol' => 'Rp',
                'minor_unit' => 0,
                'is_active' => true,
            ],
            [
                'code' => 'USD',
                'name' => 'US Dollar',
                'symbol' => '$',
                'minor_unit' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'EUR',
                'name' => 'Euro',
                'symbol' => '€',
                'minor_unit' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'JPY',
                'name' => 'Japanese Yen',
                'symbol' => '¥',
                'minor_unit' => 0,
                'is_active' => true,
            ],
            [
                'code' => 'SGD',
                'name' => 'Singapore Dollar',
                'symbol' => 'S$',
                'minor_unit' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'MYR',
                'name' => 'Malaysian Ringgit',
                'symbol' => 'RM',
                'minor_unit' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'THB',
                'name' => 'Thai Baht',
                'symbol' => '฿',
                'minor_unit' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'VND',
                'name' => 'Vietnamese Dong',
                'symbol' => '₫',
                'minor_unit' => 0,
                'is_active' => true,
            ],
            [
                'code' => 'CNY',
                'name' => 'Chinese Yuan',
                'symbol' => '¥',
                'minor_unit' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'KRW',
                'name' => 'South Korean Won',
                'symbol' => '₩',
                'minor_unit' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($data as $key => $value) {
            $currency = Currency::updateOrCreate(
                ['code' => $value['code']],
                $value,
            );
        }
    }
}
