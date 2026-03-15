@extends('components.layouts.master_1.main')

@section('sidebar.administrator.roles.active', 'active')

@push('scripts')
    <script src="{{ asset('components/layouts/master_1/assets/js/plugin/datatables/datatables.min.js') }}"></script>
@endpush

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Peran</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [['label' => 'Peran', 'url' => route('roles.index')], ['label' => 'Daftar']],
        ])
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Peran</h4>
                </div>
                <div class="card-body">
                    @include('administratormodule::roles.table')
                </div>
            </div>
        </div>
    </div>
@endsection
