<?php

namespace Modules\AdministratorModule\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Modules\AdministratorModule\Http\Requests\StoreCurrencyRequest;
use Modules\AdministratorModule\Http\Requests\UpdateCurrencyRequest;
use Yajra\DataTables\Facades\DataTables;

class CurrencyController extends Controller
{
    public function __construct()
    {
        // $this->middleware('can:administratormodule-currency.index')->only('index');
        // $this->middleware('can:administratormodule-currency.create')->only(['create', 'store']);
        // $this->middleware('can:administratormodule-currency.show')->only('show');
        // $this->middleware('can:administratormodule-currency.edit')->only(['edit', 'update']);
        // $this->middleware('can:administratormodule-currency.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        if ($request->ajax()) {
            if ($request->datatable == 'main') {
                $dataTable = DataTables::of($query);

                $dataTable->editColumn('action', function ($row) {
                    $result = view('administratormodule::currencies.table_action', compact('row'))->render();
                    if ($result) {
                        return $result;
                    }
                    return null;
                });
                $dataTable->rawColumns(['action']);

                return $dataTable->make(true);
            }
        }

        return view('administratormodule::currencies.index');
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
    public function store(StoreCurrencyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        //
    }
}
