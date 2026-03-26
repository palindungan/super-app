<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public static array $data = [
        [
            'label' => 'Utama',
            'data' => [
                [
                    'label' => 'Beranda',
                    'permissions' => [
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'home.index',
                        ],
                    ],
                ],
            ],
        ],
        [
            'label' => 'Administrator',
            'data' => [
                [
                    'label' => 'Mata Uang',
                    'permissions' => [
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-currencies.index',
                        ],
                        [
                            'label' => 'Buat',
                            'name' => 'administrator-currencies.create',
                        ],
                        [
                            'label' => 'Perbarui',
                            'name' => 'administrator-currencies.edit',
                        ],
                        [
                            'label' => 'Hapus',
                            'name' => 'administrator-currencies.destroy',
                        ],
                    ],
                ],
                [
                    'label' => 'Peran dan Izin',
                    'permissions' => [
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-roles.index',
                        ],
                        [
                            'label' => 'Buat',
                            'name' => 'administrator-roles.create',
                        ],
                        [
                            'label' => 'Perbarui',
                            'name' => 'administrator-roles.edit',
                        ],
                        [
                            'label' => 'Hapus',
                            'name' => 'administrator-roles.destroy',
                        ],
                    ],
                ],
            ],
        ],
    ];
}
