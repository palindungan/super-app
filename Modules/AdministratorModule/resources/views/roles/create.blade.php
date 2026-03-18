@extends('components.layouts.master_1.main')

@section('sidebar.administrator.roles.active', 'active')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Buat Peran</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Peran', 'url' => route('administrator-roles.index')],
                ['label' => 'Buat'],
            ],
        ])
    </div>

    <div class="row">
        @include('administratormodule::roles.fields')
        <div class="col-md-12">
            <button class="btn btn-success">Buat</button>
            <button class="btn btn-danger">Batal</button>
        </div>
    </div>
@endsection
