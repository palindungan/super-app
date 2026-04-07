<?php

namespace Modules\AdministratorModule\Http\Controllers\Company\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BranchUser;
use App\Models\Company;
use App\Repositories\BranchUserRepository;
use Modules\AdministratorModule\Http\Requests\Company\Branch\StoreBranchUserRequest;
use Modules\AdministratorModule\Http\Requests\Company\Branch\UpdateBranchUserRequest;
use Yajra\DataTables\Facades\DataTables;

class BranchUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company, Branch $branch)
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = BranchUserRepository::getQuery()
                    ->select(
                        'branch_users.*',
                        'users.name as user_name'
                    );

                $query->where('branch_users.branch_id', $branch->id);

                $dataTable = DataTables::of($query);

                $dataTable->editColumn('action', function ($row) {
                    $result = view('administratormodule::companies.branches.branch_users.table_action', compact('row'))->render();
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
    public function store(StoreBranchUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchUser $branchUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchUser $branchUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchUserRequest $request, BranchUser $branchUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchUser $branchUser)
    {
        //
    }
}
