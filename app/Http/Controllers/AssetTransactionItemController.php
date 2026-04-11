<?php

namespace App\Http\Controllers;

use App\Models\AssetTransactionItem;
use App\Http\Requests\StoreAssetTransactionItemRequest;
use App\Http\Requests\UpdateAssetTransactionItemRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Facades\DataTables;

class AssetTransactionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = AssetTransactionItem::getQuery()
                    ->leftJoin('asset_items', 'asset_items.id', '=', 'asset_transaction_items.asset_item_id')
                    ->leftJoin('asset_transactions', 'asset_transactions.id', '=', 'asset_transaction_items.asset_transaction_id')
                    ->leftJoin('locations AS origin_locations', 'origin_locations.id', '=', 'asset_transactions.origin_location_id')
                    ->leftJoin('locations AS destination_locations', 'destination_locations.id', '=', 'asset_transactions.destination_location_id')
                    ->select(
                        'asset_transaction_items.*',
                        'asset_items.code AS asset_item_code',
                        'asset_items.name AS asset_item_name',
                        'asset_transactions.code AS asset_transaction_code',
                        'asset_transactions.date AS asset_transaction_date',
                        'origin_locations.name AS origin_location_name',
                        'destination_locations.name AS destination_location_name',
                    );

                $dataTable = DataTables::of($query);

                $dataTable->editColumn('action', function ($row) {
                    $result = view('asset_transaction_items.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });

                $dataTable->rawColumns(['action']);

                return $dataTable->make(true);
            }
        }

        return view('asset_transaction_items.index');
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
    public function store(StoreAssetTransactionItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetTransactionItem $assetTransactionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetTransactionItem $assetTransactionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetTransactionItemRequest $request, AssetTransactionItem $assetTransactionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetTransactionItem $assetTransactionItem)
    {
        //
    }
}
