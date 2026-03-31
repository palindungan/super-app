@extends('components.layouts.master_1.main')

@section('sidebar.administrator.currencies.active', 'active')

@include('components.resources.assets.index')

@push('scripts')
    @include('components.validation.script')
@endpush

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
                        @can('administrator-currencies.create')
                            <button class="btn btn-primary btn-round ms-auto" onclick="createAction()">
                                <i class="fa fa-plus"></i>
                                Buat Mata Uang
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @include('administratormodule::currencies.table')
                </div>
            </div>
        </div>
    </div>

    @include('administratormodule::currencies.fields')
@endsection

@include('components.resources.assets.simple_modal_create', [
    'url' => route('administrator-currencies.store'),
])
@include('components.resources.assets.simple_modal_edit')
@include('components.resources.assets.simple_modal_show')
@push('scripts')
    <script>
        function editTitleData(data) {
            $('#edit_title_data').text(data.name);
        }
    </script>
@endpush
