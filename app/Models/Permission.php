<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public static array $data = [
        [
            'label' => 'Utama',
            'menu' => [
                [
                    'label' => 'Beranda',
                    'permissions' => [
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'home.index',
                            'guard_name' => 'web',
                        ],
                    ],
                ],
            ],
        ],
        [
            'label' => 'Administrator',
            'menu' => [
                [
                    'label' => 'Mata Uang',
                    'permissions' => [
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-currencies.index',
                            'guard_name' => 'web',
                        ],
                        [
                            'label' => 'Buat',
                            'name' => 'administrator-currencies.create',
                            'guard_name' => 'web',
                        ],
                        [
                            'label' => 'Perbarui',
                            'name' => 'administrator-currencies.edit',
                            'guard_name' => 'web',
                        ],
                        [
                            'label' => 'Hapus',
                            'name' => 'administrator-currencies.destroy',
                            'guard_name' => 'web',
                        ],
                    ],
                ],
                [
                    'label' => 'Peran dan Izin',
                    'permissions' => [
                        [
                            'label' => 'Lihat Apa Saja',
                            'name' => 'administrator-roles.index',
                            'guard_name' => 'web',
                        ],
                        [
                            'label' => 'Buat',
                            'name' => 'administrator-roles.create',
                            'guard_name' => 'web',
                        ],
                        [
                            'label' => 'Perbarui',
                            'name' => 'administrator-roles.edit',
                            'guard_name' => 'web',
                        ],
                        [
                            'label' => 'Hapus',
                            'name' => 'administrator-roles.destroy',
                            'guard_name' => 'web',
                        ],
                    ],
                ],
            ],
        ],
    ];
}
