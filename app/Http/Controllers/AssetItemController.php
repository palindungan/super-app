<?php

namespace App\Http\Controllers;

use App\Models\AssetItem;
use App\Http\Requests\StoreAssetItemRequest;
use App\Http\Requests\UpdateAssetItemRequest;
use App\Models\AssetCategory;
use App\Models\AssetStatus;
use App\Repositories\AssetItemRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
                    'asset_item_values.value AS asset_value',
                );

                $dataTable = DataTables::of($query);

                $dataTable->editColumn('purchase_price', function ($row) {
                    return number_format($row->purchase_price, 0, ',', '.');
                });

                $dataTable->editColumn('quantity', function ($row) {
                    return number_format($row->quantity, 0, ',', '.');
                });

                $dataTable->editColumn('asset_value', function ($row) {
                    return number_format($row->asset_value, 0, ',', '.');
                });

                $dataTable->editColumn('photo', function ($row) {
                    if (!$row->photo) {
                        return null;
                    }
                    $url = asset('storage/' . $row->photo);
                    return '<img src="' . $url . '" width="60">';
                });

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

                $dataTable->with('totals', function () use ($query, $request) {
                    $filteredQuery = clone $query;

                    if ($search = $request->input('search.value')) {
                        $filteredQuery->where(function ($q) use ($search) {
                            $q->where('asset_items.code', 'ilike', "%$search%")
                                ->orWhere('asset_items.name', 'ilike', "%$search%")
                                ->orWhere('asset_categories.name', 'ilike', "%$search%")
                                ->orWhereRaw("CAST(asset_items.purchase_date AS text) ILIKE ?", ["%$search%"])
                                ->orWhereRaw("CAST(asset_items.purchase_price AS text) ILIKE ?", ["%$search%"])
                                ->orWhereRaw("CAST(asset_items.quantity AS text) ILIKE ?", ["%$search%"])
                                ->orWhereRaw("CAST(asset_item_values.value AS text) ILIKE ?", ["%$search%"])
                                ->orWhere('asset_statuses.name', 'ilike', "%$search%")
                                ->orWhereRaw("CAST(asset_items.updated_at AS text) ILIKE ?", ["%$search%"]);
                        });
                    }

                    $totals = DB::table(DB::raw("({$filteredQuery->toSql()}) as sub"))
                        ->mergeBindings($filteredQuery->getQuery())
                        ->selectRaw('SUM(CAST(purchase_price AS numeric) * CAST(quantity AS numeric)) as total_asset_value')
                        ->first();

                    return [
                        'total_asset_value' => number_format($totals->total_asset_value ?? 0, 0, ',', '.'),
                    ];
                });

                $dataTable->rawColumns(['photo', 'action']);

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

                if ($path) {
                    $asset_item->update([
                        'photo' => $path
                    ]);
                }
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
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $assetItem,
            // 'errors' => null,
        ], 200);
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

            // proses upload photo
            if ($request->hasFile('photo')) {
                // hapus photo lama jika ada
                if ($assetItem->photo && Storage::disk('public')->exists($assetItem->photo)) {
                    Storage::disk('public')->delete($assetItem->photo);
                }

                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = $assetItem->id . '.' . $extension;
                $path = $file->storeAs(
                    'asset_items/photo',
                    $filename,
                    'public'
                );

                if ($path) {
                    $input['photo'] = $path;
                }
            }

            $assetItem->update($input);

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
    public function destroy(AssetItem $assetItem)
    {
        $request = request();

        if ($request->ajax()) {
            // hapus photo jika ada
            if ($assetItem->photo && Storage::disk('public')->exists($assetItem->photo)) {
                Storage::disk('public')->delete($assetItem->photo);
            }

            $assetItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                // 'data' => null,
                // 'errors' => null,
            ], 200);
        }
    }
}
