<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetTransaction extends Model
{
    protected $fillable = [
        'origin_location_id',
        'destination_location_id',
        'code',
        'date',
        'notes',
    ];
}
