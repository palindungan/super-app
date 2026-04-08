<?php

namespace App\Http\Controllers;

use App\Models\AssetItem;
use App\Http\Requests\StoreAssetItemRequest;
use App\Http\Requests\UpdateAssetItemRequest;
use App\Models\AssetCategory;
use App\Models\AssetStatus;
use App\Repositories\AssetItemRepository;
use Yajra\DataTables\Facades\DataTables;

class AssetItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = AssetItemRepository::getQuery()->select(
                    'asset_items.*',
                    'asset_categories.name AS asset_category_name',
                    'asset_statuses.name AS asset_status_name',
                );

                $dataTable = DataTables::of($query);

                $dataTable->editColumn('updated_at', function ($row) {
                    return !empty($row->updated_at) ? $row->updated_at->format('Y-m-d H:i:s') : null;
                });

                $dataTable->editColumn('action', function ($row) {
                    $result = view('asset_items.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });

                $dataTable->rawColumns(['action']);

                return $dataTable->make(true);
            }
        }

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

            // buat asset dulu
            $asset_item = AssetItem::create($input);

            // proses upload photo
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = $asset_item->id . '.' . $extension;

                $path = $file->storeAs(
                    'asset_items/photo',
                    $filename,
                    'public'
                );

                $asset_item->update([
                    'photo' => $path
                ]);
            }

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
