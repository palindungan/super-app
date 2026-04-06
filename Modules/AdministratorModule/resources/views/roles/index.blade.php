@extends('components.layouts.master_1.main')

@section('sidebar.administrator.roles.active', 'active')

@include('components.resources.assets.index')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Peran</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Peran', 'url' => route('administrator.roles.index')],
                ['label' => 'Daftar'],
            ],
        ])
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Peran</h4>
                        @can('administrator.roles.create')
                            <a class="btn btn-primary btn-round ms-auto" href="{{ route('administrator.roles.create') }}">
                                <i class="fa fa-plus"></i>
                                Buat Peran
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @include('administratormodule::roles.table')
                </div>
            </div>
        </div>
    </div>
@endsection
