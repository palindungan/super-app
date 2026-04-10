<?php

namespace App\Http\Controllers;

use App\Models\AssetItem;
use App\Http\Requests\StoreAssetItemRequest;
use App\Http\Requests\UpdateAssetItemRequest;
use App\Models\AssetCategory;
use App\Models\AssetStatus;

class AssetItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset_categories = [null => 'Pilih Kategori'] + AssetCategory::query()
            ->select('asset_categories.*')
            ->orderBy('asset_categories.name', 'asc')
            ->pluck('name', 'id')
            ->toArray();

        $asset_statuses = [null => 'Pilih Status'] + AssetStatus::query()
            ->select('asset_statuses.*')
            ->orderBy('asset_statuses.name', 'asc')
            ->pluck('name', 'id')
            ->toArray();

        return view(
            'asset_items.index',
            compact(
                'asset_categories',
                'asset_statuses',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetItem $assetItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetItem $assetItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetItemRequest $request, AssetItem $assetItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetItem $assetItem)
    {
        //
    }
}
