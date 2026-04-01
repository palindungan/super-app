@extends('components.layouts.master_1.main')

@section('sidebar.administrator.companies.active', 'active')

@include('components.resources.assets.index')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Perusahaan</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Perusahaan', 'url' => route('administrator-companies.index')],
                ['label' => 'Daftar'],
            ],
        ])
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Perusahaan</h4>
                        @can('administrator-companies.create')
                            <a class="btn btn-primary btn-round ms-auto" href="{{ route('administrator-companies.create') }}">
                                <i class="fa fa-plus"></i>
                                Buat Perusahaan
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @include('administratormodule::companies.table')
                </div>
            </div>
        </div>
    </div>
@endsection
