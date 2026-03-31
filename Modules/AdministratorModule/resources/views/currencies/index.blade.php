@extends('components.layouts.master_1.main')

@section('sidebar.administrator.currencies.active', 'active')

@include('components.resources.assets.index')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Mata Uang</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Mata Uang', 'url' => route('administrator-currencies.index')],
                ['label' => 'Daftar'],
            ],
        ])
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Mata Uang</h4>
                        <button class="btn btn-primary btn-round ms-auto" onclick="createAction()">
                            <i class="fa fa-plus"></i>
                            Buat Mata Uang
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @include('administratormodule::currencies.table')
                </div>
            </div>
        </div>
    </div>

    @include('administratormodule::currencies.fields')
    @include('administratormodule::currencies.create')
    @include('administratormodule::currencies.show')
    @include('administratormodule::currencies.edit')
@endsection
