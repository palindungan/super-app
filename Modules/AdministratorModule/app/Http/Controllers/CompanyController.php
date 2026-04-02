<?php

namespace Modules\AdministratorModule\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Modules\AdministratorModule\Http\Requests\StoreCompanyRequest;
use Modules\AdministratorModule\Http\Requests\UpdateCompanyRequest;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrator-companies.index')->only('index');
        $this->middleware('can:administrator-companies.create')->only(['create', 'store']);
        $this->middleware('can:administrator-companies.show')->only('show');
        $this->middleware('can:administrator-companies.edit')->only(['edit', 'update']);
        $this->middleware('can:administrator-companies.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $query = CompanyRepository::getQuery()
                    ->select(
                        'companies.*',
                        'default_currencies.name AS default_currency_name',
                    );

                $dataTable = DataTables::of($query);

                $dataTable->editColumn('action', function ($row) {
                    $result = view('administratormodule::companies.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });

                $dataTable->rawColumns(['action']);

                return $dataTable->make(true);
            }
        }

        return view('administratormodule::companies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administratormodule::companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        if ($response = tokenFormCheck($request->_token_form)) return redirect(route('administrator-companies.index'))
            ->withInput()
            ->with('error', $response);

        $input = $request->all();
        $company = Company::create($input);

        return redirect(route('administrator-companies.index'))->with('success', "Data berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('administratormodule::companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if ($response = tokenFormCheck($request->_token_form)) return redirect(route('administrator-companies.index'))
            ->withInput()
            ->with('error', $response);

        $input = $request->all();
        $company->update($input);

        if (!$request->has('tab')) {
            return redirect(route('administrator-companies.edit', $company->id))->with('success', "Data berhasil diubah");
        }

        return redirect(route('administrator-companies.edit', ['company' => $company->id, 'tab' => $request->tab]))->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $request = request();

        if ($request->ajax()) {
            $company->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                // 'data' => null,
                // 'errors' => null,
            ], 200);
        }
    }
}
