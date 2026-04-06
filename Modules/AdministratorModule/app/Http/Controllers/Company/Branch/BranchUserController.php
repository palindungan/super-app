<?php

namespace Modules\AdministratorModule\Http\Requests\Company\Branch;

use App\Http\Controllers\Controller;
use App\Models\BranchUser;
use Modules\AdministratorModule\Http\Requests\Company\Branch\StoreBranchUserRequest;
use Modules\AdministratorModule\Http\Requests\Company\Branch\UpdateBranchUserRequest;

class BranchUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
