<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'default_currency_id',
        'code',
        'name',
    ];
}
