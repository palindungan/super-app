<?php

namespace App\Http\Controllers;

use App\Models\AssetTransactionItem;
use App\Http\Requests\StoreAssetTransactionItemRequest;
use App\Http\Requests\UpdateAssetTransactionItemRequest;
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
                    ->select(
                        'asset_transaction_items.*',
                        'asset_items.name AS asset_item_name',
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
