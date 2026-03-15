<?php

namespace Modules\AdministratorModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\AdministratorModule\Http\Requests\StoreRoleRequest;
use Modules\AdministratorModule\Http\Requests\UpdateRoleRequest;
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
                $dataTable->editColumn('action', function ($row) {
                    $result = view('administratormodule::roles.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });
                $dataTable->rawColumns(['action']);

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
        return view('administratormodule::roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        //
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
        return view('administratormodule::roles.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
