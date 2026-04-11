<?php

namespace App\Http\Controllers\AssetTransaction;

use App\Http\Controllers\Controller;
use App\Models\AssetTransactionItem;
use App\Http\Requests\AssetTransaction\StoreAssetTransactionItemRequest;
use App\Http\Requests\AssetTransaction\UpdateAssetTransactionItemRequest;
use App\Models\AssetTransaction;
use Yajra\DataTables\Facades\DataTables;

class AssetTransactionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AssetTransaction $assetTransaction)
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = AssetTransactionItem::getQuery()
                    ->select(
                        'asset_transaction_items.*',
                    );

                $query->where('asset_transaction_items.asset_transaction_id', $assetTransaction->id);

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
    public function store(StoreAssetTransactionItemRequest $request, AssetTransaction $assetTransaction)
    {
        if ($request->ajax()) {
            if ($response = tokenFormCheck($request->_token_form)) {
                return response()->json([
                    'success' => false,
                    'message' => $response,
                    // 'data' => null,
                    // 'errors' => null,
                ], 422);
            }

            $input = $request->all();
            $input['asset_transaction_id'] = $assetTransaction->id;
            $asset_item = AssetTransactionItem::create($input);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dibuat',
                'data' => [
                    '_token_form' => tokenFormGenerate(),
                ],
                // 'errors' => null,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetTransaction $assetTransaction, AssetTransactionItem $assetTransactionItem)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $assetTransactionItem,
            // 'errors' => null,
        ], 200);
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
    public function update(UpdateAssetTransactionItemRequest $request, AssetTransaction $assetTransaction, AssetTransactionItem $assetTransactionItem)
    {
        if ($request->ajax()) {
            if ($response = tokenFormCheck($request->_token_form)) {
                return response()->json([
                    'success' => false,
                    'message' => $response,
                    // 'data' => null,
                    // 'errors' => null,
                ], 422);
            }

            $input = $request->all();
            $assetTransactionItem->update($input);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
                'data' => [
                    '_token_form' => tokenFormGenerate(),
                ],
                // 'errors' => null,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetTransaction $assetTransaction, AssetTransactionItem $assetTransactionItem)
    { {
            $request = request();

            if ($request->ajax()) {
                $assetTransactionItem->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil dihapus',
                    // 'data' => null,
                    // 'errors' => null,
                ], 200);
            }
        }
    }
}
