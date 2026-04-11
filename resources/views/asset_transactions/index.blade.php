@extends('components.layouts.master_1.main')

@section('sidebar.asset_transactions.active', 'active')

@include('components.resources.assets.v1.index')

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Transaksi Aset</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Transaksi Aset', 'url' => route('asset_transactions.index')],
                ['label' => 'Daftar'],
            ],
        ])
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Transaksi Aset</h4>
                        @can('asset_transactions.create')
                            <a class="btn btn-primary btn-round ms-auto" href="{{ route('asset_transactions.create') }}">
                                <i class="fa fa-plus"></i>
                                Buat Transaksi Aset
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @include('asset_transactions.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@include('components.resources.assets.v1.simple_modal_destroy')
