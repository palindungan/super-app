@extends('components.layouts.master_1.main')

@section('sidebar.administrator.companies.active', 'active')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Ubah Cabang</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Perusahaan', 'url' => route('administrator.companies.index')],
                [
                    'label' => $company->name,
                    'url' => route('administrator.companies.edit', [$company->id, 'tab' => 'branches']),
                ],
                [
                    'label' => 'Cabang',
                    'url' => route('administrator.companies.edit', [$company->id, 'tab' => 'branches']),
                ],
                [
                    'label' => $branch->name,
                    'url' => route('administrator.companies.branches.edit', [$branch->company_id, $branch->id]),
                ],
                ['label' => 'Ubah'],
            ],
        ])
    </div>

    <div class="row">
        <form action="{{ route('administrator.companies.branches.update', [$branch->company_id, $branch->id]) }}"
            method="POST" onsubmit="formOnSubmitButton(this)">
            @include('components.forms.data', ['method' => 'PUT'])
            @include('administratormodule::companies.branches.fields')
            <div class="col-md-12">
                <button type="submit" class="btn btn-warning">Ubah</button>
                <a class="btn btn-light"
                    href="{{ route('administrator.companies.edit', [$company->id, 'tab' => 'branches']) }}">Batal</a>
            </div>
        </form>
    </div>
@endsection
