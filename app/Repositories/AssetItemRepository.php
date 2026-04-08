<?php

namespace App\Repositories;

use App\Models\AssetItem;
use Illuminate\Support\Facades\DB;

class AssetItemRepository
{
    public static function getQuery($param = [])
    {
        $query = AssetItem::query();
        $query->leftJoin('asset_categories', 'asset_categories.id', '=', 'asset_items.asset_category_id');
        $query->leftJoin('asset_statuses', 'asset_statuses.id', '=', 'asset_items.asset_status_id');
        return $query;
    }
}
