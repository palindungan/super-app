<?php

namespace App\Http\Controllers;

use App\Models\AssetTransaction;
use App\Http\Requests\StoreAssetTransactionRequest;
use App\Http\Requests\UpdateAssetTransactionRequest;
use Yajra\DataTables\Facades\DataTables;

class AssetTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = AssetTransaction::select(
                    'asset_transactions.*',
                );

                $dataTable = DataTables::of($query);

                $dataTable->editColumn('action', function ($row) {
                    $result = view('asset_transactions.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });

                $dataTable->rawColumns(['action']);

                return $dataTable->make(true);
            }
        }

        return view('asset_transactions.index');
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
    public function store(StoreAssetTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetTransaction $assetTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetTransaction $assetTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetTransactionRequest $request, AssetTransaction $assetTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetTransaction $assetTransaction)
    {
        //
    }
}
