<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
                    'label' => 'Peran dan Izin',
                    'permissions' => [
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-roles.index',
                        ],
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-roles.create',
                        ],
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-roles.edit',
                        ],
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-roles.destroy',
                        ],
                    ],
                ],
            ],
        ],
    ];
}
