<?php

namespace Modules\AdministratorModule\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Company;
use App\Repositories\BranchRepository;
use Illuminate\Support\Facades\DB;
use Modules\AdministratorModule\Http\Requests\Company\StoreBranchRequest;
use Modules\AdministratorModule\Http\Requests\Company\UpdateBranchRequest;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = BranchRepository::getQuery()
                    ->select(
                        'branches.*',
                        DB::raw('COALESCE(branch_user_counts.count, 0) as branch_user_count'),
                    );

                if (isset($request['get_by_company_id'])) {
                    $query->where('branches.company_id', $request['get_by_company_id']);
                }

                $dataTable = DataTables::of($query);

                $dataTable->filterColumn('branch_user_count', function ($query, $keyword) {
                    $query->whereRaw(
                        'CAST(COALESCE(branch_user_counts.count, 0) as TEXT) LIKE ?',
                        ["%{$keyword}%"]
                    );
                });

                $dataTable->editColumn('action', function ($row) {
                    $result = view('administratormodule::companies.branches.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });

                $dataTable->rawColumns(['action']);

                return $dataTable->make(true);
            }
        }

        return "companies.branches.index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        return view('administratormodule::companies.branches.create')->with('company', $company);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request, Company $company)
    {
        if ($response = tokenFormCheck($request->_token_form)) return redirect(route('administrator.companies.edit', [$company->id, 'tab' => 'branches']))
            ->withInput()
            ->with('error', $response);

        $input = $request->all();
        $input['company_id'] = $company->id;
        $branch = Branch::create($input);

        return redirect(route('administrator.companies.edit', [$company->id, 'tab' => 'branches']))->with('success', "Data berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company, Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company, Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, Company $company, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, Branch $branch)
    {
        $request = request();

        if ($request->ajax()) {
            $branch->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                // 'data' => null,
                // 'errors' => null,
            ], 200);
        }
    }
}
