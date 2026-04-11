<?php

namespace App\Repositories;

use App\Models\AssetItem;
use App\Models\AssetTransaction;
use Illuminate\Support\Facades\DB;

class AssetTransactionRepository
{
    public static function getQuery($param = [])
    {
        $query = AssetTransaction::query();
        $query->leftJoin('locations AS origin_locations', 'origin_locations.id', '=', 'asset_transactions.origin_location_id');
        $query->leftJoin('locations AS destination_locations', 'destination_locations.id', '=', 'asset_transactions.destination_location_id');
        return $query;
    }
}
