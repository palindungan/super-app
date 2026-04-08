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

        // Virtual table: nilai aset
        $nilaiAset = DB::table('asset_items')
            ->select('id', DB::raw('(quantity * purchase_price) AS value'));

        $query->leftJoinSub($nilaiAset, 'asset_value_sub', function ($join) {
            $join->on('asset_items.id', '=', 'asset_value_sub.id');
        });
        return $query;
    }
}
