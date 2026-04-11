<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetTransactionItem extends Model
{
    protected $fillable = [
        'asset_transaction_id',
        'asset_item_id',
        'purchase_price',
        'quantity',
        'asset_value',
    ];
}
