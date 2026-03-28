@extends('components.layouts.master_1.main')

@section('sidebar.administrator.roles.active', 'active')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/datatables/dataTables.bootstrap5.min.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('components/layouts/master_1/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}">
    </script>
    @include('components.notifications.bootstrap_notify')
@endpush

@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Peran</h3>
        @include('components.layouts.master_1.breadcrumb.main', [
            'breadcrumbs' => [
                ['label' => 'Peran', 'url' => route('administrator-roles.index')],
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
                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('administrator-roles.create') }}">
                            <i class="fa fa-plus"></i>
                            Buat Peran
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @include('administratormodule::roles.table')
                </div>
            </div>
        </div>
    </div>
@endsection
