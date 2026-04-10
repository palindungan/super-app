<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetItem extends Model
{
    protected $fillable = [
        'asset_category_id',
        'asset_status_id',
        'code',
        'name',
        'photo',
    ];
}
