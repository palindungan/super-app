<?php

namespace Modules\AdministratorModule\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission as ModelsPermission;
use Illuminate\Support\Facades\DB;
use Modules\AdministratorModule\Http\Requests\StoreRoleRequest;
use Modules\AdministratorModule\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:administratormodule-role.index')->only('index');
        // $this->middleware('can:administratormodule-role.create')->only(['create', 'store']);
        // $this->middleware('can:administratormodule-role.show')->only('show');
        // $this->middleware('can:administratormodule-role.edit')->only(['edit', 'update']);
        // $this->middleware('can:administratormodule-role.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatables == 'main') {
                $permission_count = DB::table('role_has_permissions')
                    ->select('role_id', DB::raw('COUNT(permission_id) as permissions_count'))
                    ->groupBy('role_id');

                $query = Role::query()
                    ->select(
                        'roles.*',
                        DB::raw('COALESCE(permission_counts.permissions_count,0) as permissions_count'),
                    )
                    ->leftJoinSub($permission_count, 'permission_counts', function ($join) {
                        $join->on('roles.id', '=', 'permission_counts.role_id');
                    });

                $dataTable = DataTables::of($query);
                $dataTable->editColumn('guard_name', function ($row) {
                    return $row->guard_name
                        ? "<span class='badge bg-warning'>{$row->guard_name}</span>"
                        : null;
                });

                $dataTable->editColumn('permissions_count', function ($row) {
                    return $row->permissions_count
                        ? "<span class='badge bg-warning'>{$row->permissions_count}</span>"
                        : null;
                });
                $dataTable->editColumn('updated_at', function ($row) {
                    return !empty($row->updated_at) ? $row->updated_at->format('Y-m-d H:i:s') : null;
                });
                $dataTable->editColumn('action', function ($row) {
                    $result = view('administratormodule::roles.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });
                $dataTable->rawColumns(['guard_name', 'permissions_count', 'action']);

                return $dataTable->make(true);
            }
        }

        return view('administratormodule::roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions_data = ModelsPermission::$data;

        return view(
            'administratormodule::roles.create',
            compact(
                'permissions_data',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create([
            "name" => $request->name,
            "guard_name" => $request->guard_name,
        ]);

        $permissions = [];
        if ($request->permissions) {
            $permissions = array_unique($request->permissions);
        }
        $role->syncPermissions($permissions);

        return redirect(route('administrator-roles.index'))->with('success', "Data berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('administratormodule::roles.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions_data = ModelsPermission::$data;

        $role_has_permissions = $role->permissions->pluck('name')->toArray();

        return view(
            'administratormodule::roles.edit',
            compact(
                'permissions_data',
                'role_has_permissions',
            )
        )->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update([
            "name" => $request->name,
            "guard_name" => $request->guard_name,
        ]);

        $permissions = [];
        if ($request->permissions) {
            $permissions = array_unique($request->permissions);
        }
        $role->syncPermissions($permissions);

        return redirect(route('administrator-roles.index'))->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $request = request();

        $role->syncPermissions([]);

        $role->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                // 'data' => null,
                // 'errors' => null,
            ], 200);
        }

        return redirect(route('administrator-roles.index'))->with('success', "Data berhasil dihapus");
    }
}
