<?php

namespace App\Http\Controllers\AssetTransaction;

use App\Http\Controllers\Controller;
use App\Models\AssetTransactionItem;
use App\Http\Requests\AssetTransaction\StoreAssetTransactionItemRequest;
use App\Http\Requests\AssetTransaction\UpdateAssetTransactionItemRequest;
use Yajra\DataTables\Facades\DataTables;

class AssetTransactionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($asset_transaction_id)
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = AssetTransactionItem::getQuery()
                    ->select(
                        'asset_transaction_items.*',
                    );

                $query->where('asset_transaction_items.asset_transaction_id', $asset_transaction_id);

                $dataTable = DataTables::of($query);

                $dataTable->editColumn('action', function ($row) {
                    $result = view('asset_transactions.asset_transaction_items.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });

                $dataTable->rawColumns(['action']);

                return $dataTable->make(true);
            }
        }
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
