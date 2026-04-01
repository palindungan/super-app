<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'code',
        'name',
        'symbol',
        'minor_unit',
        'is_active',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'default_currency_id');
    }
}
